<?php
require '../dao/Convenio.php'; 

$convenio  = new Convenio();

if(isset( $_GET['action'])){
    if( $_GET['action']=='listar'){
        echo $convenio->listConvenio(); 
    }
    
   
}
