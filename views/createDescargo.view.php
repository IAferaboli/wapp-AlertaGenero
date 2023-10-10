<?php
require_once "../layout/head.view.php";
?>

<head>
    <title>Descargo</title>
</head>

<body class="form-vista-3">
    <?php
    require_once "../layout/menu.view.php";
    ?>
    <div class="bodi">
        <div class="form-container-3">
            <div>
                <div>
                    <form action="" method="post">
                        <div>
                            <h2>Descripción del hecho</h2>
                        </div>
                        <div class="row">
                            <div>
                                <h4>Tipo de violencia</h4>
                            </div>
                            <br>
                            <?php foreach ($tipos as $tipo) { ?>
                                <div class="col col-4 col-md-4">
                                    <!-- Radio list -->
                                    <label>
                                    <input type="radio" name="tipo_violenciaSeleccionada[]" value="<?= $tipo->id_tipo ?>"><?= $tipo->nombre ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <br>
                        <div class="row">
                            <div>
                                <h4>Modalidad de violencia</h4>
                            </div>
                            <br>
                            <?php foreach ($modalidades as $modalidad) { ?>
                                <div class="col col-4 col-md-4">
                                    <!-- Radio list -->
                                    <label>
                                    <input type="radio" name="modalidadSeleccionada[]" value="<?= $modalidad->id_modalidad ?>"><?= $modalidad->nombre ?>
                                
                                    </label>
                                    <!-- <input type="radio" name="modalidadSeleccionada[]" value="<?= $modalidad->id_modalidad ?>"><?= $modalidad->nombre ?> -->
                                </div>
                            <?php } ?>
                        </div>
                        <br>
                        <div>
                            <h4>Descripción del hecho</h4>
                            <textarea rows="6" cols="50" name="tatuaje" placeholder="Descripción del hecho" maxlength="500"></textarea>
                        </div>
                        <br>
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