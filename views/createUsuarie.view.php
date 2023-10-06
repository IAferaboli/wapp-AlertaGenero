<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="icon" href="../src/alertagenero_logo.png">
    <title>Usuarie</title>
</head>

<body class="homelander">
    <header>
        <div class="header-left">
            <div class="logo">
                <a href="../controladores/createUsuarie.php"><img src="../src/alertagenero_logo.png" alt="Logo-alerta_genero"></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="../controladores/createUsuarie.php">Inicio</a>
                    </li>
                    <li>
                        <a href="../controladores/createUsuarie.php">Capacitación</a>
                    </li>
                    <li>
                        <a href="../controladores/createUsuarie.php">Politica de privacidad</a>
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
    <div class="bodi">
        <div class="form-container">
            <div>
                <div>
                    <form action="" method="post">

                        <h2>Datos Personales</h2>

                        <label for="dni"><b>Nro. Documento</b></label>
                        <input type="number" id="dni" placeholder="Ingresar dni (Sin puntos)" name="dni" required>

                        <label for="nombre"><b>Nombre</b></label>
                        <input type="text" id="nombre" placeholder="Ingresar nombre (DNI)" name="nombre" required>

                        <label for="nombre_autoperc"><b>Nombre autopercibido</b></label>
                        <input type="text" id="nombre_autoperc" placeholder="Ingresar nombre autopercibido" name="nombre_autoperc">

                        <label for="apellido"><b>Apellido</b></label>
                        <input type="text" id="apellido" placeholder="Ingresar apellido (DNI)" name="apellido" required>

                        <label for="fecnac"><b>Fecha de nacimiento</b></label>
                        <input type="date" id="fecnac" placeholder="(AAAA-MM-DD))" name="fecnac" required>

                        <label for="celContacto" class="form-label"><b>Celular Contacto</b></label>
                        <input type="text" id="celContacto" placeholder="Sin 0 ni 15" name="celContacto" required>

                        <label for="id_institucion"><b>Institución</b></label>
                        <select class="seleccion" name="id_institucion" placeholder="Institución" required>
                            <?php foreach ($instituciones as $institucion) : ?>
                                <option value="<?= $institucion->id_institucion ?>"><?= $institucion->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="checkbox">
                            <input type="checkbox" name="atencionMed[]" value="0"> <strong>Necesité atención medica</strong></input><br>
                        </div>
                        <button class="button-1" type="submit">Siguiente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <footer>
            <ul class="social_icon"><!--clase hecha para la vinvulacion de iconos externos-->
                <li><a href="" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="" target="_blank"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
                <li><a href="" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a></li>
            </ul>
            <ul class="menu"><!--Menu secundario-->
                <li><a href="../controladores/createUsuarie.php">Inicio</a></li>
                <!-- <li><a href="" target="_blank">Ubicacion</a></li> -->
                <li><a href="">Soporte</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
            <p>©2023 Alerta Genero <br> Todos los derechos resevados.</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>