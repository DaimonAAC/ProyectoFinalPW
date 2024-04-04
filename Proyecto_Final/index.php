<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Practica final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#">
            <img src="img/libro.ico" width="30" height="24" class="d-inline-block align-text-top">
        </a>
        <a class="navbar-brand" href="Index.html">Libreria Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="autores.php">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Libros</h1>
            <p class="lead fw-normal text-white-50 mb-0">Informacion de libros</p>
        </div>
    </div>
</header>

<!-- section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php
            try {
                $conn = new PDO("mysql:host=sql313.infinityfree.com;dbname=if0_36292917_dblibreria", "if0_36292917", "UN3MGw00Qs7");
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Consulta para obtener todos los libros
                $stmt = $conn->query("SELECT titulos.titulo, titulos.notas, titulos.id_titulo, titulos.precio FROM titulos");
                $libros = $stmt->fetchAll();

                // Mostrar tarjetas de libros
                foreach ($libros as $libro) {
                    echo '<div class="col mb-5">';
                    echo '    <div class="card h-100">';
                    // Aquí podrías mostrar la imagen del libro si la tienes almacenada en tu base de datos
                    echo '        <div class="card-body p-4">';
                    echo '            <div class="text-center">';
                    echo '                <h5 class="fw-bolder">' . $libro['titulo'] . '</h5>';
                    echo '                <p class="card-text">' . $libro['notas'] . '</p>';
                    echo '                <p class="card-text">Precio: $' . $libro['precio'] . '</p>';
                    // Puedes agregar más detalles del libro si los tienes en tu base de datos
                    echo '            </div>';
                    echo '        </div>';
                    echo '        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                    echo '            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver detalles</a></div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            ?>

        </div>
    </div>
</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2024</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
