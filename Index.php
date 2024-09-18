<?php include("Scripts/Alertas.php") ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Content/css/bootstrap.min.css">
</head>

<body>
    <header>
    </header>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">

            <section class="col-lg-12 col-md-6 p-5 card text-bg-light">
                <!--ALERTA- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                <?php ErrorCredenciales(); ?>
                <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                <h1 class="text-center">¡Bienvenido!</h1>
                <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
                <form method="post" action="Controllers/Usuario.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
                        <input name="NombreUsuario" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input name="Clave" type="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button name="Autenticar" type="submit" class="btn btn-primary w-50">Iniciar sesión</button>
                    </div>
                </form>
                <!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
            </section>
        </div>

    </div>
    <footer>
    </footer>
</body>
<script src="Content/js/bootstrap.bundle.min.js"></script>

</html>