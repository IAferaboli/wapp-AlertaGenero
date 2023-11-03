<?php
require_once "../models/descargos.php";

$cantDescargos = Descargo::countDescargos()->fetch_assoc()['COUNT(*)'];

$cantEmerg= Descargo::countEmerg()->fetch_assoc()['COUNT(*)'];
$porcentaje = $cantEmerg * 100 / $cantDescargos;
$porcentajeEmerg = round($porcentaje,2);




require_once "../views/informe.view.php";

