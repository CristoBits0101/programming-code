<?php
    // Declarar $valores_defecto como una variable global.
    global $valores_defecto;

    // Paso 1) Almacenar la ruta del fichero.
    $ruta = "cristo_valores_defecto.txt";
    
    // Paso 2.A) Comprobar que el fichero está dentro de la ruta.
    if (file_exists($ruta))
    {
        // Paso 3) Abrir el fichero en modo lectura porque existe en la ruta.
        $fichero = fopen($ruta, "r");
        
        // Paso 4.A) Comprobar que el fichero se abrió correctamente.
        /**
         *  - if ($fichero): No se puede comprobar directamente porque fopen devuelve un resource.
         *  - Hay que comprobar si el valor es diferente de falso, que significa que no lo pudo abrir.
         */
        if ($fichero !== false)
        {
            // Paso 5) Creamos el array asociativo que va a guardar los datos del fichero.
            $valores_defecto = array();
            
            // Paso 6) Leemos las líneas del fichero.
            while ($linea = fgets($fichero))
            {
                // Paso 7) Separamos la clave del valor.
                /**
                 *  - Al no indicar clave, la próxima línea lo sobreescribe.
                 *  - Seguirá siendo una variable convirtiéndose todo el rato en arrays.
                 */
                $parts = explode(": ", $linea);
                
                // Paso 8.A) Verificamos que el array contiene, 3 pociones o más: Clave, Valor y Null.
                if (count($parts) >= 2) 
                {
                    $_clave = trim($parts[0]);           // Almacenamos el primer valor del array que siempre será una clave.
                    $_valor = trim($parts[1]);           // Almacenamos el segundo valor del array que siempre será el valor.
                    $valores_defecto[$_clave] = $_valor; // Añadimos al array asociativo la clave y el valor.
                }

                // Paso 8.B) Si no se cumple el formato en una línea no lo guardamos y indicamos el error de la línea.
                else 
                {
                    echo "La siguiente línea: '" . $linea . "' no cumple el formato correcto";
                }
            }

            // Paso 9) Cerramos el fichero después de usarlo para que no consuma memoria.
            fclose($fichero);
        }

        // Paso 4.B) Si el archivo no se puede abrir, lo indicamos y finalizamos la ejecución.
        else 
        {
            echo "No se puede abrir el archivo '" . $ruta . "'<br>";
        }
    }

    // Paso 2.B) Lanzar un mensaje de error porque el fichero no existe en la ruta.
    else 
    {
        echo "El archivo '" . $ruta . "' no existe en el directorio actual. <br/>";
    }
    print_r($valores_defecto);
    // $valores_defecto = array
    // (
    //     "name"           => "Cristo Rubén Pérez Suárez",
    //     "password"       => "asdf76asd7f6",
    //     "repeatPassword" => "asdf76asd7f6",
    //     "developer"      => "Full-Stack Engineer",
    //     "i+d"            => "I+D",
    //     "incorporation"  => "15 días"
    // );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título del documento -->
    <title>Formularios UT2</title>
    <!-- Estilos del formulario -->
    <style>
        body 
        {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container 
        {
            width: 50%;
            margin: 2% auto;
            padding: 2%;
            border: 1px solid darkgray;
            background-color: lightgray;
        }
        h1 
        {
            margin: 0;
            padding: 0;
            text-align: center;
        }
        label 
        {
            width: 30%;
            font-weight: bold;
        }
        input 
        {
            width: 70%;
            float: right;
        }
        .disponibilidad 
        {
            display: flex;
        }
        p 
        {
            margin: 0;
            padding: 0;
        }
        .enviar 
        {
            width: 20%;
            float: none;
            margin: 0 auto;
        }
        .checkbox, .radio 
        {
            font-weight: normal !important;
        }
    </style>
</head>
<body>
    <!-- Contenedor del formulario -->
    <div class="container">
        <!-- Título con el autor del código -->
        <h1>Cristo Rubén Pérez Suárez</h1>
        <br/>
        <!-- Formulario de petición laboral -->
        <form action="./recibe_datos.php" method="post">
            <!-- Input de texto -->
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="<?php echo $valores_defecto["name"];
                        // Regex
                        $nombre = $valores_defecto["name"];
                        $patron = '/^[A-Z][a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u';
                        // Ternaria.
                        $mensaje = 
                        (
                            // Condición
                            isset($valores_defecto)                                     // Compruebo que el array está declarado y no tiene un valor nulo.
                            && 
                            !empty($valores_defecto)                                    // Compruebo que el array no está vacío.
                            && 
                            is_array($valores_defecto)                                  // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            &&
                            array_key_exists("name", $valores_defecto)                  // Compruebo si el array contiene la clave del campo antes de serializar.
                            &&
                            in_array("Cristo Rubén Pérez Suárez", $valores_defecto)     // Compruebo que el nombre del usuario coincide con el de la base de datos.
                            &&
                            preg_match($patron, $nombre)                                // Compruebo que se cumple el formato de caracteres para el nombre.
                        )
                            // True.
                            ?  trim                                                     // Se eliminan los espacios antes de serializar el contenido en el input.
                                (
                                    filter_var                                          // Este filtro elimina todos los caracteres especiales, incluidos los que se usan para ataques XSS y SQL Injection.
                                    (
                                        $valores_defecto["name"], 
                                        FILTER_SANITIZE_FULL_SPECIAL_CHARS
                                    )
                                )
                            // False.
                            : "Error al buscar su nombre";                              // Se dispararía la excepción.
                        echo $mensaje;
                    ?>
                ">
            </div>
            <br/>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" value="<?php
                        $password = $valores_defecto["password"];
                        $patron = '/^(?=.*[a-zA-Z0-9@#$%^&+=]{4,15})[a-zA-Z0-9@#$%^&+=]*$/';
                        $mensaje =
                            (
                                // Condición
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                && 
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                && 
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                                &&
                                array_key_exists("password", $valores_defecto)          // Compruebo que el array contiene la clave del campo antes de serializar.
                                &&
                                in_array("asdf76asd7f6", $valores_defecto)              // Compruebo que el password del usuario coincide con el de la base de datos.
                                &&
                                preg_match($patron, $password)                          // Compruebo que se cumple el formato de caracteres para la password sin el atributo wtx-context.
                            )
                                // True.
                                ? trim
                                    (
                                        filter_var
                                        (
                                            $valores_defecto["password"], 
                                            FILTER_SANITIZE_FULL_SPECIAL_CHARS
                                        )
                                    )
                                // False.
                                : "Error al buscar su contraseña";                      // Se dispararía la excepción.
                        echo $mensaje;
                    ?>
                " data-wtx-context="none">
            </div>
            <br/>
            <div>
                <label for="repeatPassword">Confirme su contraseña:</label>
                <input type="password" id="repeatPassword" name="repeatPassword" value="<?php
                        // Regex
                        $repeatPassword = $valores_defecto["repeatPassword"];
                        $patron = '/^(?=.*[a-zA-Z0-9@#$%^&+=]{4,15})[a-zA-Z0-9@#$%^&+=]*$/';
                        // Ternaria.
                        $mensaje = 
                        (
                            // Condición
                            isset($valores_defecto)                                     // Compruebo que el array está declarado y no tiene un valor nulo.
                            && 
                            !empty($valores_defecto)                                    // Compruebo que el array no está vacío.
                            &&
                            is_array($valores_defecto)                                  // Compruebo que es un conjunto de datos del usuario lo que almacene.
                            &&
                            array_key_exists("repeatPassword", $valores_defecto)        // Compruebo que el array contiene la clave del campo antes de serializar.
                            &&
                            in_array("asdf76asd7f6", $valores_defecto)                  // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            &&
                            preg_match($patron, $repeatPassword)                        // Compruebo que se cumple el formato de caracteres para el repeatPassword.
                        )
                            // True.
                            ?  trim                                                     // Se eliminan los espacios antes de serializar el contenido en el input.
                                (
                                    filter_var                                          // Este filtro elimina todos los caracteres especiales, incluidos los que se usan para ataques XSS y SQL Injection.
                                    (
                                        $valores_defecto["repeatPassword"], 
                                        FILTER_SANITIZE_FULL_SPECIAL_CHARS
                                    )
                                )
                            // False.
                            : "Error al buscar la confirmación de contraseña";          // Se dispararía la excepción.
                        echo $mensaje;
                    ?>
                ">
            </div>
            <br/>
            <!-- Input checkbox -->
            <fieldset style="font-weight: normal !important;">
                <legend><b>Selecciona los puestos de interés:</b></legend>
                <br/>
                <div>
                    <input type="checkbox" id="desing" value="UX/UI Design" name="job[]"  
                        <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("desing", $valores_defecto)            // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("UX/UI Design", $valores_defecto)              // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />
                    <label for="desing" class="checkbox">UX/UI Design</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="developer" value="Full-Stack Engineer" name="job[]" 
                        <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("developer", $valores_defecto)         // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("Full-Stack Engineer", $valores_defecto)       // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />
                    <label for="developer" class="checkbox">Full-Stack Engineer</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="devops" value="DevOps" name="job[]" 
                        <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("devops", $valores_defecto)            // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("DevOps", $valores_defecto)                    // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />
                    <label for="devops" class="checkbox">DevOps</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="cloud" value="Cloud Solutions Architect" name="job[]" 
                        <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("cloud", $valores_defecto)             // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("Cloud Solutions Architect", $valores_defecto) // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />
                    <label for="cloud" class="checkbox">Cloud Solutions Architect</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="data" value="Data Science" name="job[]" 
                        <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("data", $valores_defecto)              // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("Data Science", $valores_defecto)              // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />
                    <label for="data" class="checkbox">Data Science</label>
                </div>
                <br/>
            </fieldset>
            <br/>
            <!-- Input type radio -->
            <div>
                <fieldset>
                <legend><b>Selecciona un proyecto:</b></legend>
                    <br/>
                    <div>
                        <input type="radio" id="ecommerce" name="proyect" value="ecommerce" 
                            <?php
                                if 
                                (
                                    // Condición.
                                    array_key_exists("ecommerce", $valores_defecto)         // Compruebo si el array contiene la clave del campo antes de chequear.
                                    && 
                                    in_array("E-commerce", $valores_defecto)                // Compruebo si el valor que nos llega es el mismo que el del campo.
                                    &&
                                    isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                    &&
                                    !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                    &&
                                    is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                                )
                                    echo "checked";
                            ?>
                        />
                        <label for="ecommerce" class="radio">E-commerce</label>
                    </div>
                    <br/>
                    <div>
                        <input type="radio" id="i+d" name="proyect" value="i+d" 
                            <?php
                                if 
                                (
                                    // Condición.
                                    array_key_exists("i+d", $valores_defecto)               // Compruebo si el array contiene la clave del campo antes de chequear.
                                    && 
                                    in_array("I+D", $valores_defecto)                       // Compruebo si el valor que nos llega es el mismo que el del campo.
                                    &&
                                    isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                    &&
                                    !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                    &&
                                    is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                                )
                                    echo "checked";
                            ?>
                        />
                        <label for="i+d" class="radio">I+D</label>
                    </div>
                    <br/>
                </fieldset>
            </div>
            <br/>
            <!-- Selector de opciones -->
            <div class="disponibilidad">
                <p><b>Disponibilidad:<span>&nbsp;</b></span></p>
                <select name="incorporation" title="Fecha de incorporación">
                    <option value="Inmediata"
                    <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("incorporation", $valores_defecto)     // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("Inmediata", $valores_defecto)                 // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "selected";
                        ?>
                    >
                        Inmediata
                    </option>
                    <option value="15 días" 
                        <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("incorporation", $valores_defecto)     // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("15 días", $valores_defecto)                   // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "selected";
                        ?>
                    >
                        15 días
                    </option>
                </select>
            </div>
            <input type="hidden" id="postId" name="postId" value="Cristo" />
            <br/>
            <!-- Botón que envía el formulario a ser validado -->
            <div style="display: flex;">
                <input type="submit" value="Enviar" class="enviar">
            </div>
        </form>
    </div>
</body>
</html>