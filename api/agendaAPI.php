<?php
require '../dao/Agenda.php'; 
$cod_medico= $_GET['cod_medico'];
$action =$_GET['action'];
$agenda  = new Agenda();

if($action=="listar"){
    echo $agenda->getAgendaByMedico($cod_medico);
};

if($action=="inserir"){
    
};

if($action=="alterar"){
    
};

if($action=="apagar"){
    
};
if($action=="buscar"){
    
};