<?php
require '../dao/Convenio.php'; 

$convenio  = new Convenio();

if(isset( $_GET['action'])){
    if( $_GET['action']=='listar'){
        echo $convenio->listConvenio(); 
    }
    
      if( $_GET['action']=='buscarConvenioPlano'){
          
        echo $convenio->buscarConvenioPLano($_GET['codigoConvenioPlano']); 
    }
     
}

