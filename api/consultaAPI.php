<?php

require '../dao/Consulta.php'; 



$consulta  = new Consulta();
$action = isset($_GET['action'])?$_GET['action']:$_POST['action'];


if($action=="listar"){
    
    echo $consulta->listar();
}


if($action=="listarByPaciente"){
    $codigo_paciente= $_GET['codigo_paciente'];
    
    echo $consulta->listarByPaciente($codigo_paciente);
}


if($action=="ultimaConsulta"){
    
    $consultaDados = array( "codigo_paciente"      => $_GET['codigoPaciente']);
    
    echo $consulta->ultimaConsulta($consultaDados);
};


if($action=="buscar"){

     $consultaDados = array(
            "codigo_agenda"      => $_POST['codigo_agenda']     ,
            "codigo_paciente"       => $_POST['codigo_paciente']
            );
     
           echo $consulta->buscarPorCodigoAgenda($consultaDados);


    
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
     
           echo $consulta->inserir($consultaDados);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

