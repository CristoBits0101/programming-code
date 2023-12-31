<?php

    // Validar.
    $data = "";                                                                                     // Recoge los datos.
    $errors = "";                                                                                   // Recoge los errores.

    foreach ($_REQUEST as $field => $value)                                                         // Validación de campos.
        if (!isset($value) || empty($value))
            $errors = "<p>'Error en campo $field no almacenado.</p><br/>";

    foreach ($_FILES as $key => $file)                                                              // Validación de ficheros.
    {
        $allowed_types = array("image/jpeg", "image/png", "image/gif");

        if (!in_array($file['type'], $allowed_types))                                               // Validación del formato.
        {
            $errors .= "<p>Error en campo $key: Tipo de archivo no permitido.</p><br/>";
            continue;
        }

        $max_size = 2 * 1024 * 1024;

        if ($file['size'] > $max_size)                                                              // Validación del tamaño.
        {
            $errors .= "<p>Error en campo $key: El archivo supera el tamaño permitido.</p><br/>";
            continue;
        }
    }

    // Escribir.
    if (empty($errors))                                                                             // Comprobación de errores.
    {
        foreach ($_REQUEST as $field => $value)
        {
            if (isset($value) && !empty($value) && !is_array($value))
                $data .= "$field: $value\n";

            elseif (isset($value) && !empty($value) && is_array($value))
                $data .= "$field: " . implode(', ', $value) . "\n";
        }

        foreach ($_FILES as $key => $file)
        {
            $data .= $key . ': ' . '/files/' . $file["name"] . "\n";
            move_uploaded_file($file["tmp_name"], "./files/" . $file["name"]);                      // Almacenamiento de ficheros.
        }

        $data .= "\n";

        file_put_contents("formulario_recibido.txt", $data, FILE_APPEND);                           // Almacenamiento de datos.
    }

    else
        echo $errors;

    // Obtenemos.
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $categoría = $_POST['categoría'];
    
    // Importar.
    require_once "./configuration.php";

    // Conectar.
    $conn = connect_to_database();

    // Preparar.
    $stmt = $conn->prepare("INSERT INTO productos (nombre, precio, imagen, categoría) VALUES (:nombre, :precio, :imagen, :categoría)");

    // Sincronizar.
    $stmt->bindParam(':nombre',     $nombre,    PDO::PARAM_STR);
    $stmt->bindParam(':precio',     $precio,    PDO::PARAM_INT);
    $stmt->bindParam(':imagen',     $imagen,    PDO::PARAM_STR);
    $stmt->bindParam(':categoría',  $categoría, PDO::PARAM_STR);

    // Ejecutar.
    $stmt->execute();

    // Finalizar.
    $conn = null;
    $stmt = null;

?>