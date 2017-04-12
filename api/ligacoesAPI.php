<?php

require '../dao/Ligacoes.php'; 



$ligacoes  = new Ligacoes();
$action = isset($_GET['action'])?$_GET['action']:$_POST['action'];


if($action=="listar"){
    echo $ligacoes->listar();
}




if($action=="buscar"){

     $consultaDados = array(
            "codigo_agenda"      => $_POST['codigo_agenda']     ,
            "codigo_paciente"       => $_POST['codigo_paciente']
            );
     
           echo $ligacoes->buscarPorCodigoAgenda($consultaDados);


    
}

if($action=="inserir"){
    
     $consultaDados = array(
            "numeroProntuario"      => $_POST['numeroProntuario']     ,
            "dataAtendimento"       => $_POST['dataAtendimento']      ,
            "codigoConvenio"        => $_POST['codigoConvenio']       ,
            "numeroGuia"            => $_POST['numeroGuia']           ,
            "observacoes"           => $_POST['observacoes']          ,
            "Retorno"               => "false"            , 
            "codigo_convenio_plano" => $_POST['codigo_convenio_plano'],
            "codigo_paciente"       => $_POST['codigo_paciente']
            );
     
           echo $ligacoes->inserir($consultaDados);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

