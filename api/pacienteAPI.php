<?php
require '../dao/Pacientes.php'; 
$paciente  = new Pacientes();
$action = $_GET['action'];

if($action=='buscar'){
    $id = $_GET['id'];
    echo $paciente->find($_GET['id']); 
}
if($action=='incluir'){
    $id = $_GET['id'];
}

if($action=='alterar'){
    $id = $_GET['id'];
}
