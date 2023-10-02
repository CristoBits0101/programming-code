<?php

    /**
     *  - Activity: AO1.2
     *  - Author: Cristo Rubén Pérez Suárez
     */

    // Lunes.
    $_horario[1][1] = "Docente: MarR<br/>Módulo: DEW<br/>Taller: G201<br/>"; // 08:00 - 08:55
    $_horario[1][2] = "Docente: MarR<br/>Módulo: DEW<br/>Taller: G201<br/>"; // 08:55 - 09:50
    $_horario[1][3] = "Docente: MarM<br/>Módulo: DPL<br/>Taller: G201<br/>"; // 09:50 - 10:45
    $_horario[1][4] = "Docente: SerR<br/>Módulo: DSW<br/>Taller: G201<br/>"; // 11:15 - 12:10
    $_horario[1][5] = "Docente: MarV<br/>Módulo: DOR<br/>Taller: G201<br/>"; // 12:10 - 13:05
    $_horario[1][6] = "Docente: MarV<br/>Módulo: DOR<br/>Taller: G201<br/>"; // 13:05 - 14:00

    // Martes.
    $_horario[2][1] = "Docente: MarR<br/>Módulo: DEW<br/>Taller: G201<br/>"; // 08:00 - 08:55
    $_horario[2][2] = "Docente: MarR<br/>Módulo: DEW<br/>Taller: G201<br/>"; // 08:55 - 09:50
    $_horario[2][3] = "Docente: MarV<br/>Módulo: DOR<br/>Taller: G201<br/>"; // 09:50 - 10:45
    $_horario[2][4] = "Docente: MarV<br/>Módulo: DOR<br/>Taller: G201<br/>"; // 11:15 - 12:10
    $_horario[2][5] = "Docente: SerR<br/>Módulo: DSW<br/>Taller: G201<br/>"; // 12:10 - 13:05
    $_horario[2][6] = "Docente: SerR<br/>Módulo: DSW<br/>Taller: G201<br/>"; // 13:05 - 14:00

    // Miércoles.
    $_horario[3][1] = "Docente: MarR<br/>Módulo: DEW<br/>Taller: G201<br/>"; // 08:00 - 08:55
    $_horario[3][2] = "Docente: MarR<br/>Módulo: DEW<br/>Taller: G201<br/>"; // 08:55 - 09:50
    $_horario[3][3] = "Docente: MarR<br/>Módulo: DEW<br/>Taller: G201<br/>"; // 09:50 - 10:45
    $_horario[3][4] = "Docente: MarM<br/>Módulo: DPL<br/>Taller: G201<br/>"; // 11:15 - 12:10
    $_horario[3][5] = "Docente: SerR<br/>Módulo: DSW<br/>Taller: G201<br/>"; // 12:10 - 13:05
    $_horario[3][6] = "Docente: SerR<br/>Módulo: DSW<br/>Taller: G201<br/>"; // 13:05 - 14:00

    // Jueves.
    $_horario[4][1] = "Docente: MarV<br/>Módulo: DOR<br/>Taller: G201<br/>"; // 08:00 - 08:55
    $_horario[4][2] = "Docente: MarV<br/>Módulo: DOR<br/>Taller: G201<br/>"; // 08:55 - 09:50
    $_horario[4][3] = "Docente: MarG<br/>Módulo: EMR<br/>Taller: G201<br/>"; // 09:50 - 10:45
    $_horario[4][4] = "Docente: SerR<br/>Módulo: DSW<br/>Taller: G201<br/>"; // 11:15 - 12:10
    $_horario[4][5] = "Docente: MarR<br/>Módulo: DPL<br/>Taller: G201<br/>"; // 12:10 - 13:05
    $_horario[4][6] = "Docente: MarR<br/>Módulo: DPL<br/>Taller: G201<br/>"; // 13:05 - 14:00

    // Viernes.
    $_horario[5][1] = "Docente: MarG<br/>Módulo: EMR<br/>Taller: G201<br/>"; // 08:00 - 08:55
    $_horario[5][2] = "Docente: MarG<br/>Módulo: EMR<br/>Taller: G201<br/>"; // 08:55 - 09:50
    $_horario[5][3] = "Docente: SerR<br/>Módulo: DSW<br/>Taller: G201<br/>"; // 09:50 - 10:45
    $_horario[5][4] = "Docente: SerR<br/>Módulo: DSW<br/>Taller: G201<br/>"; // 11:15 - 12:10
    $_horario[5][5] = "Docente: MarM<br/>Módulo: DPL<br/>Taller: G201<br/>"; // 12:10 - 13:05
    $_horario[5][6] = "Docente: MarM<br/>Módulo: DPL<br/>Taller: G201<br/>"; // 13:05 - 14:00

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AO1.2 by Cristo Rubén Pérez Suárez</title>
</head>

<style>
    table 
    {
        border-collapse: collapse;  /* Para colapsar los bordes de las celdas */
        width: 100%;                /* Opcional: ajustar el ancho de la tabla */
        border: 1px solid #000;     /* Borde externo de la tabla              */
    }

    th, td 
    {
        border: 2px solid #000;     /* Borde interno de las celdas            */
        padding: 8px;               /* Espacio interno en las celdas          */
    }

    caption 
    {
        caption-side: top;          /* Coloca el título sobre la tabla        */
        font-weight: bold;          /* Estilo del título                      */
    }
</style>

<body style="font-family:Arial, Helvetica, sans-serif">

    <table>
        <caption style="padding: 1rem 0rem; text-transform:uppercase; color:red; font-family:sans-serif">Horario semanal de clases</caption>
        <thead style="color:blue">
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $_izquierda = "text-align:right;";

                // Itera la primera clave del array en vertical.
                for ($hora = 1; $hora <= 6; $hora++)                    
                {
                    // Creamos una fila en el cuerpo de la tabla.
                    echo "<tr>";                                        

                    // Añade un valor al primer campo de la fila.
                    if ($hora == 1) {echo "<td style='$_izquierda'>08:00 - 08:55</td>";}
                    if ($hora == 2) {echo "<td style='$_izquierda'>08:55 - 09:50</td>";}
                    if ($hora == 3) {echo "<td style='$_izquierda'>09:50 - 10:45</td>";}
                    if ($hora == 4) {echo "<td style='$_izquierda'>11:15 - 12:10</td>";}
                    if ($hora == 5) {echo "<td style='$_izquierda'>12:10 - 13:05</td>";}
                    if ($hora == 6) {echo "<td style='$_izquierda'>13:05 - 14:00</td>";}                                      
                    
                    // Itera la segunda clave del array en horizontal.
                    for ($dia = 1; $dia <= 5; $dia++)                   
                    {
                        // Añade el resto de valores a los campos de la fila.
                        echo "<td>" . $_horario[$dia][$hora] . "</td>"; 
                    }
                    
                    // Finalizamos la fila.
                    echo "</tr>";                                       
                }
            ?>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>

</body>

</html>