<?php
require_once "../layout/head.view.php";
?>


<head>
    <title>Agresores</title>
</head>

<body class="form-vista-2">
    <?php
    require_once "../layout/menu.view.php";
    ?>
    <div class="bodi">
        <div class="form-container-2">
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
                                    <label>
                                        <input type="radio" name="alturaSeleccionada[]" value="<?= $altura->id_altura ?>"><?= $altura->altura ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row">
                            <div>
                                <h4>Color pelo</h4>
                            </div>
                            <?php foreach ($pelos as $pelo) { ?>
                                <div class="col col-4 col-md-4">
                                    <!-- Radio list -->
                                    <label>
                                        <input type="radio" name="peloSeleccionado[]" value="<?= $pelo->id_color ?>"><?= $pelo->color ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <br>
                        <div>
                            <h4>Tatuajes</h4>
                            <textarea rows="4" cols="50" name="tatuaje" placeholder="Descripción a detalle sobre tatuajes" maxlength="100"></textarea>
                        </div>
                        <br>
                        <div>
                            <h4>cicatrices</h4>
                            <textarea rows="4" cols="50" name="cicatriz" placeholder="Descripción a detalle sobre cicatriz" maxlength="100"></textarea>
                        </div>
                        <button class="button-1" type="submit">Siguiente</a></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once "../layout/footer.view.php";
    ?>
</body>

</html>