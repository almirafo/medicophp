<?php
require '../dao/Agenda.php'; 
$cod_medico= $_GET['cod_medico'];
$action =$_GET['action'];
$agenda  = new Agenda();

if($action=="listar"){
    echo $agenda->getAgendaByMedico($cod_medico);
};

if($action=="inserir"){
   $agendaDados = isset($_POST['$agendaDados']) ?$_POST['$agendaDados']:"";
   
   echo $agendaDados;
   
   $agenda->insertAgenda($agendaDados); 
};

if($action=="alterar"){
    
};

if($action=="apagar"){
    
};
if($action=="buscar"){
    
};