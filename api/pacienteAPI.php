<?php
header('Access-Control-Allow-Origin: *'); 
require '../dao/Pacientes.php'; 
$paciente  = new Pacientes();
$action = $_GET['action'];

if($action=='buscar'){
    $id = $_GET['codigo_paciente'];
    echo $paciente->find($_GET['codigo_paciente']); 
}
if($action=='incluir'){
    $id = $_GET['codigo_paciente'];
}

if($action=='alterar'){
    $id = $_GET['codigo_paciente'];
}


if($action=="pacienteUltimaConsulta"){
     echo $paciente->pacienteUltimaConsulta($_GET['codigo_paciente']);
}