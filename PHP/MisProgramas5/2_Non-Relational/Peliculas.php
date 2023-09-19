<!-- Basándote en el ejercicio con la información de películas, realizar las acciones mediante la utilización de una BD relacional y no relacional -->
<!DOCTYPE html>

<html>

<head>

    <title>Información de Películas</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/form-validation.css" rel="stylesheet">

    <script type="text/javascript" src="js/acciones.js"></script>

</head>
<body>

    <div class="container-fluid">

        <div class="col-md-8 order-md-1">

            <h4 class="mb-3">Información de Películas</h4>

            <form>

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo">
                </div>

                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" class="form-control" id="director">
                </div>

                <div class="form-group">
                    <label for="actores">Actores</label>
                    <input type="text" class="form-control" id="actores">
                </div>

                <div class="form-group">
                    <label for="genero">Género</label>
                    <input type="text" class="form-control" id="genero">
                </div>

                <div class="form-group">
                    <label for="duracion">Duracion</label>
                    <input type="text" class="form-control" id="duracion">
                </div>

                <div class="form-group">
                    <label for="argumento">Argumento</label>
                    <textarea class="form-control" id="argumento" rows="3"></textarea>
                </div>
                
                <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                        <li class="page-item"><a onclick="obtenerPelicula(1);" class="page-link" href="#">1</a></li>
                        <li class="page-item"><a onclick="obtenerPelicula(2);" class="page-link" href="#">2</a></li>
                        <li class="page-item"><a onclick="obtenerPelicula(3);" class="page-link" href="#">3</a></li>
                        <li class="page-item"><a onclick="obtenerPelicula(4);" class="page-link" href="#">4</a></li>
                    </ul>
                </nav>

            </form>

            <?php
                // require "datos/db.php";
                // otrasFormasCargaDB(1);
            ?>

        </div>

    </div>

</body>

</html>