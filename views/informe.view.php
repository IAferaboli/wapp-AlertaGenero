<?php
require_once "../layout/head.view.php";
?>

<head>
    <title>Informe</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="form-vista-1">
    <?php
    require_once "../layout/menu.view.php";
    ?>
    <div class="separador">
        <div class="bodi">
            <div class="form-container-1-1">
                <div class="button-container">
                    <button onclick="count()" class="button-2">Total Descargos</button>
                    <button onclick="countEmerg()" class="button-2">Porcentaje At. Medica</button>
                    <button class="button-2">Rango Etario</button>
                    <!-- <button class="button-2">Descargo por instituciones</button> -->
                    <button class="button-2"><a href="../controladores/especial.html" class="link2">Final de Presentación</a></button>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once "../layout/footer.view.php";
    ?>

    <script>
        function count() {
            Swal.fire({
                title: 'Cantidad de descargos!',
                text: 'Al momento de realizar la presente consulta, se han realizado <?= $cantDescargos ?> descargos.',
                // icon: 'success',
                imageUrl: 'https://img.freepik.com/fotos-premium/mujer-hombre-pelean-mientras-sentado-cama-su-casa_85574-6915.jpg?w=740',
                imageWidth: 400,
                imageHeight: 300,
                background: 'rgba(125, 51, 168',
                color:'white'
            })
        }
    </script>
     
    <script>
        function countEmerg() {
            Swal.fire({
                title: 'Cantidad de Emergencias!',
                text: 'Al momento de realizar la presente consulta, el <?= $porcentajeEmerg ?> % de los usuaries indicó haber necesitado atención médica.',
                // icon: 'success',
                imageUrl: 'https://img.freepik.com/fotos-premium/paciente-accidente-emergencia-sufrio-cabeza-acostada-camilla-entrenamiento-primeros-auxilios-movimiento-paciente-caso-accidente-emergencia-paramedico-transfiere-al-paciente-al-coche-ambulancia-seleccione-centrarse-bolsa-primeros-auxilios_41097-372.jpg?w=740',
                imageWidth: 400,
                imageHeight: 300,
                background: 'rgba(125, 51, 168',
                color:'white'
                
            })
        }
    </script>

</body>

</html>