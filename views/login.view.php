<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../src/alertagenero_logo.png">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="cuerpoform">
    <form action="" class="formulario" method="POST">
        <h1 class="title">Ingreso a informe</h1>
        <label>
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" id="username" placeholder="nombre de usuario">
        </label>

        <label>
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="contraseña">
        </label>
        <a href="../controladores/createUsuarie.php" class="link">volver al inicio</a>


        <button id="button" class="alerta" type="submit">Ingresar</button>
    </form>
</body>
</html>