<?php
require_once "../models/descargos.php";

$cantDescargos = Descargo::countDescargos()->fetch_assoc()['COUNT(*)'];

$cantEmerg= Descargo::countEmerg()->fetch_assoc()['COUNT(*)'];
$porcentaje = $cantEmerg * 100 / $cantDescargos;
$porcentajeEmerg = round($porcentaje,2);
$age1 = Descargo::age1()->fetch_assoc()['COUNT(*)'];
$age2 = Descargo::age2()->fetch_assoc()['COUNT(*)'];
$age3 = Descargo::age3()->fetch_assoc()['COUNT(*)'];


require_once "../views/informe.view.php";

