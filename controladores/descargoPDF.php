<?php

require_once '../models/descargos.php';

$idDescargo = $_GET['id_descargo'];

Descargo::generatePDF($idDescargo);
