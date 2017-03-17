<?php
require '../dao/Medico.php'; 

$medico  = new Medico();

if(isset( $_GET['action'])){
    if( $_GET['action']=='listar'){
        echo $medico->listMedico(); 
    }
    
   
}

