<?php
require_once "../layout/head.view.php";
?>

<head>
    <title>Descargo</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <h2>Datos del hecho</h2>
                        </div>
                        <div class="row">
                            <div>
                                <h4>Tipo de violencia sufrida</h4>
                            </div>
                            <br>
                            <?php foreach ($tipos as $tipo) { ?>
                                <div class="col col-4 col-md-4">
                                    <!-- Radio list -->
                                    <label>
                                        <input type="radio" name="tipo_violencia" value="<?= $tipo->id_tipo ?>"><?= $tipo->nombre ?>
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
                                        <input type="radio" name="modalidad" value="<?= $modalidad->id_modalidad ?>"><?= $modalidad->nombre ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <br>
                        <div>
                            <h4>Descripción del hecho</h4>
                            <textarea rows="6" cols="50" name="descargo" placeholder="Describe lo máximo que recuerdes para poder tomar medidas adecuadas..." maxlength="500"></textarea>
                        </div>
                        <br>

                        <button class="button-1" type="submit">Enviar</a></button>

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