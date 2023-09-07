<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/style3.css">
    <link rel="icon" href="../src/alertagenero_logo.png">
    <title>Agresor</title>
</head>

<body class="homelander">

    <header>
        <div class="header-left">
            <div class="logo">
                <a href="createUsuarie.php"><img src="../src/alertagenero_logo.png" alt="Logo-alerta_genero"></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="">Capacitación</a>
                    </li>
                    <li>
                        <a href="">Politica de privacidad</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </header>
    <script>
        hamburger = document.querySelector(".hamburger");
        nav = document.querySelector("nav");
        hamburger.onclick = function() {
            nav.classList.toggle("active");
        }
    </script>

    <div class="form-container">
        <div>
            <div>
                <form action="" method="post">


                    <label for="nombre-agresor"><b>Nombre</b></label>
                    <input type="text" id="nombre-agresor" placeholder="Ingresar nombre" name="nombre-agresor">

                    <label for="apellido-agresor"><b>Apellido</b></label>
                    <input type="text" id="apellido-agresor" placeholder="Ingresar apellido" name="apellido-agresor">

                    <div>
                        <h2>Características del agresor</h2>
                    </div>

                    <div class="row">
                        <div>
                            <h4>Altura</h4>
                        </div>
                        <?php foreach ($alturas as $altura) { ?>
                            <div class="col col-4 col-md-4">
                                <!-- Radio list -->
                                <input type="radio" name="alturaSeleccionada[]" value="<?= $altura->id_altura ?>"><?= $altura->altura ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div>
                            <h4>Color pelo</h4>
                        </div>
                        <?php foreach ($pelos as $pelo) { ?>
                            <div class="col col-4 col-md-4">
                                <!-- Radio list -->
                                <input type="radio" name="peloSeleccionado[]" value="<?= $pelo->id_color ?>"><?= $pelo->color ?>
                            </div>
                        <?php } ?>
                    </div>

                    <button class="button-1" type="submit">Siguiente</a></button>

                </form>
            </div>
        </div>
    </div>

</body>

</html>