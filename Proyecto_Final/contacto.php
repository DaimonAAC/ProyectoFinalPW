<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Practica final</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=sql313.infinityfree.com;dbname=if0_36292917_dblibreria", "if0_36292917", "UN3MGw00Qs7");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta para insertar en la tabla contacto
        $stmt = $conn->prepare("INSERT INTO contacto (fecha, correo, nombre, asunto, comentario) VALUES (NOW(), :correo, :nombre, :asunto, :comentario)");

        // Bind de los parámetros
        $stmt->bindParam(':correo', $_POST['email']);
        $stmt->bindParam(':nombre', $_POST['name']);
        $stmt->bindParam(':asunto', $_POST['subject']);
        $stmt->bindParam(':comentario', $_POST['message']);

        // Ejecutar la consulta
        $stmt->execute();

        echo '<div class="alert alert-success" role="alert">Message sent successfully!</div>';
    } catch(PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>';
    }
}
?>

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
                    <a class="nav-link" href="index.php">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="autores.php">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Formulario</h1>
            <p class="lead fw-normal text-white-50 mb-0">Enviar formulario</p>
        </div>
    </div>
</header>

<!-- section -->
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Formulario</h1>
                <p class="lead fw-normal text-muted mb-0">El mejor formulario que veras</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Nombre Completo</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Subject input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="subject" name="subject" type="text" placeholder="Enter your subject..." data-sb-validations="required" />
                            <label for="subject">Asunto</label>
                            <div class="invalid-feedback" data-sb-feedback="subject:required">A subject is required.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Mensaje</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Enviar</button></div>
                    </form>
                </div>
            </div>
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

