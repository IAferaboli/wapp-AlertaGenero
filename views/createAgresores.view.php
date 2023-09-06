<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Agresor</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 offset-md-4">
                <form action="" method="post" class="modal-content animate">

                    <div class="col-md-3 offset-md-4">
                        <img src="#" alt="Avatar" class="avatar">
                    </div>

                    <label for="nombre-agresor" class="form-label"><b>Nombre</b></label>
                    <input type="text" id="nombre-agresor" placeholder="Nombre del agresor" name="nombre-agresor">

                    <label for="apellido-agresor" class="form-label"><b>Apellido</b></label>
                    <input type="text" id="apellido-agresor" placeholder="Apellido del agresor" name="apellido-agresor">

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

                    <button class="btn btn-primary" type="submit">Siguiente</button>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>