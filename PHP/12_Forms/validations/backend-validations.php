<?php
    // Si el formulario enviado contiene el identificador oculto Cristo, se ejecuta la validación correspondiente.
    if ($_REQUEST['postId'] === "Cristo")
    {
            validate_form_cristo();
    }

    // Función que comprueba los datos enviados al controlador.
    function validate_form_cristo()
    {
        $datosErroneos = array();

        // Validación de texto.
        (!isset($_REQUEST['name'])           || empty($_REQUEST['name']))           ? $datosErroneos[] = "El campo nombre contiene un error ❌"                 : null;
        (!isset($_REQUEST['password'])       || empty($_REQUEST['password']))       ? $datosErroneos[] = "El campo contraseña contiene un error ❌"             : null;
        (!isset($_REQUEST['repeatPassword']) || empty($_REQUEST['repeatPassword'])) ? $datosErroneos[] = "El campo confirmé su contraseña contiene un error ❌" : null;

        // Validación de checkbox.
        if (!isset($_REQUEST['job']) || empty($_REQUEST['job'])) 
        {
            $datosErroneos[] = "Debe seleccionar al menos un puesto de trabajo de interés ❌";
        }

        // Validación de los input type radio.
        ($_REQUEST['proyect'] !== 'i+d' && $_REQUEST['proyect'] !== 'ecommerce') ? $datosErroneos[] = "Debe seleccionar una opción de proyecto ❌" : null;

        // Validación de selección de opción.
        ($_REQUEST['incorporation'] !== 'Inmediata' && $_REQUEST['incorporation'] !== '15 días') ? $datosErroneos[] = "Debe seleccionar una fecha de incorporación ❌" : null;

        /**
         *  - 1. Después de validar los campos, comprobamos si el array no está vacío para imprimir los campos que fueron erróneos.
         *  - 2. Después redireccionamos para que vuelva a cumplimentar los datos de manera correcta.
         */
        if (!empty($datosErroneos)) 
        {
            echo '<div id="mensajes">';
            
            foreach ($datosErroneos as $value) 
            {
                echo "$value <br/>";

                // Antes de volver a imprimir el siguiente campo erróneo espera 2 segundos.
                // Hay que limpiar el buffer para que el código no dispare errores internos de PHP.
                ob_flush();
                flush();
                sleep(2);
            }

            // ATENCIÓN: Imprimir un mensaje con echo y luego redireccionar con PHP dispara error por el buffer, así que se redireccionó con JS.
            // Si PHP ya ha enviado algún contenido al navegador antes de intentar cambiar los encabezados con header(), se genera el error "Cannot modify header information - headers already sent."
            // header("Location: archivo2.php");
            // exit;
            
            echo '</div>';
            
            // Redireccionar 2 segundos después de mostrar todos los mensajes utilizando JavaScript.
            echo 
            '
                <script>
                    setTimeout(function() 
                    {
                        alert("Vuelva a rellenar el formulario.");
                        window.location.href = "formulario_cristo.php";
                    }, 2000);
                </script>
            ';
            
            exit;
        }

        // Si el formulario está correcto, imprimimos un mensaje indicándolo y mostrando los datos.
        else {
            echo 
                'El formulario está correcto ✅'
                .
                '<br/><br/> <b>Nombre:</b> '               
                . 
                $_REQUEST['name']              
                .
                '<br/> <b>Contraseña1:</b> '          
                .
                $_REQUEST['password']          
                .
                '<br/> <b>Contraseña2:</b> '          
                .
                $_REQUEST['repeatPassword']    
                .
                '<br/>'                        
                ;

            foreach ($_REQUEST['job'] as $value) 
            {
                echo '<b>Puesto:</b> ' . $value . '<br/>';
            }

            echo '<b>Fecha de incorporación:</b> ' . $_REQUEST['incorporation'];
        }
    }

    function validate_form_daniel()
    {
        $datosErroneos = array();

        (!isset($_REQUEST['name'])           || empty($_REQUEST['name']))           ? $datosErroneos[] = "Error en el nombre ❌"             : null;
        (!isset($_REQUEST['email'])          || empty($_REQUEST['email']))          ? $datosErroneos[] = "Error en el correo electrónico ❌" : null;
        (!isset($_REQUEST['dni'])            || empty($_REQUEST['dni']))            ? $datosErroneos[] = "Error en el DNI ❌"                : null;


            if (!isset($_REQUEST['device']) || empty($_REQUEST['device'])) 
            {
                $datosErroneos[] = "Por favor, seleccione al menos un dispositivo ❌";
            }


        ($_REQUEST['genero'] !== 'hombre' && $_REQUEST['genero'] !== 'mujer' 
        && $_REQUEST['genero'] !== 'otro' && $_REQUEST['genero'] !== 'especificar') 
        ? $datosErroneos[] = "Por favor, elija una opción ❌" : null;

        if (!empty($datosErroneos)) 
        {
            echo '<div id="mensajes">';
            
            foreach ($datosErroneos as $value) 
            {
                echo "$value <br/>";

                ob_flush();
                flush();
                sleep(2);
            }
            
            echo '</div>';
            
            echo '<a href="./formulario_manuel.php"';
            
            exit;
        }

        else {
            echo 
                'El formulario está correcto ✅'
                .
                '<br/><br/> <b>Nombre:</b> '               
                . 
                $_REQUEST['name']              
                .
                '<br/> <b>Correo electrónico:</b> '          
                .
                $_REQUEST['email']          
                .
                '<br/> <b>DNI:</b> '          
                .
                $_REQUEST['dni']    
                .
                '<br/>'                        
                ;

            foreach ($_REQUEST['device'] as $value) 
            {
                echo '<b>Dispositivo:</b> ' . $value . '<br/>';
            }

            echo '<b>Género:</b> ' . $_REQUEST['genero'];
        }
    }
?>