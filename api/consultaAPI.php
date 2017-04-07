<?php

require '../dao/Consulta.php'; 


$consulta  = new Consulta();
$action = !isset($_GET['action'])?$_POST['action']:"";
if($action=="listarByPaciente"){
    $codigo_paciente= $_GET['codigo_paciente'];
    echo $consulta->listarByPaciente($codigo_paciente);
}

if($action=="inserir"){
    
     $consultaDados = array(
            "numeroProntuario"      => $_GET['numeroProntuario']     ,
            "dataAtendimento"       => $_GET['dataAtendimento']      ,
            "codigoConvenio"        => $_GET['codigoConvenio']       ,
            "numeroGuia"            => $_GET['numeroGuia']           ,
            "observacoes"           => $_GET['observacoes']          ,
            "Retorno"               => $_GET['Retorno']              , 
            "codigo_convenio_plano" => $_GET['codigo_convenio_plano'],
            "codigo_paciente"       => $_GET['codigo_paciente']
            );
     
     echo $consultaDados; //$consulta->inserir($consultaDados);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

