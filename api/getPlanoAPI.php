<?php
require '../dao/Plano.php';
$cod_convenio= $_GET['cod_convenio'];

$plano = new Plano();
echo $plano->getPlanoByCodigoConvenio($cod_convenio);
