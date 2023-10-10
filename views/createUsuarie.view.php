<?php
require_once "../layout/head.view.php";
?>

<head>
    <title>Usuarie</title>
</head>

<body class="form-vista-1">
    <?php
    require_once "../layout/menu.view.php";
    ?>
    <div class="bodi">
        <div class="form-container-1">
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


                        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>

                        <script type="text/javascript">
                            $('#dni').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#nombre').focus();
                                }
                            });
                            $('#nombre').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#nombre_autoperc').focus();
                                }
                            });
                            $('#nombre_autoperc').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#apellido').focus();
                                }
                            });
                            
                            $('#apellido').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#fecnac').focus();
                                }
                            });
                            
                            $('#fecnac').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#celContacto').focus();
                                }
                            });
                        </script>


                        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>

                        <script type="text/javascript">
                           
                           $('#dni').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#nombre').focus();
                                }
                            });
                           
                            $('#nombre').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#nombre_autoperc').focus();
                                }
                            });
                            
                            $('#nombre_autoperc').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#apellido').focus();
                                }
                            });
                            
                            $('#apellido').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#fecnac').focus();
                                }
                            });

                            $('#fecnac').keypress(function(e) {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#celContacto').focus();
                                }
                            });
                      
                        </script>

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