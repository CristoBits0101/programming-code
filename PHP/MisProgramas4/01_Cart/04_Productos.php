<?php

    // Comprueba que el usuario haya abierto sesión o redirige.
    require 'sesiones.php';
    require_once 'bd.php';

    comprobar_sesion();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tabla de productos por categoría</title>

</head>

<body>

    <?php

        require 'cabecera.php';

        $cat = cargar_categoria($_GET['categoria']);
        $productos = cargar_productos_categoria($_GET['categoria']);

        if ($cat === FALSE or $productos === FALSE) 
        {
            echo "<p class='error'>Error al extraer los datos</p>";
            exit;
        }

        echo "<h1>" . $cat['nombre'] . "</h1>";
        echo "<p>" . $cat['descripcion'] . "</p>";
        echo "<table>"; //abrir la tabla
        echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Stock</th><th>Comprar</th></tr>";

        foreach ($productos as $producto) 
        {
            $cod   = $producto['CodProd'];
            $nom   = $producto['Nombre'];
            $des   = $producto['Descripcion'];
            $peso  = $producto['Peso'];
            $stock = $producto['Stock'];
            
            echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$stock</td>
                <td><form action = 'anadir.php' method = 'POST'>
                <input name = 'cod' type='hidden' value = '$cod'>
                <input name = 'unidades' type='number' min = '1' value = '1'>
                <input type = 'submit' value='Comprar'>
                </form></td></tr>";
        }

        echo "</table>"

    ?>
    
</body>

</html>