<?php

require '../dao/Faturamento.php'; 



$Faturamento  = new Faturamento();
$action = isset($_GET['action'])?$_GET['action']:$_POST['action'];


if($action=="listar"){
    
    echo $Faturamento->listar();
}


if($action=="listarByPaciente"){
    $codigo_paciente= $_GET['codigo_paciente'];
    
    echo $Faturamento->listarByPaciente($codigo_paciente);
}


if($action=="listarFaturamentoByConsulta"){
    
    $FaturamentoDados = array( "codigo_consulta"      => $_GET['codigo_consulta']);
    
    echo $Faturamento->listarByConsulta($FaturamentoDados);
};


if($action=="apagar"){

}

if($action=="atualizar"){

}


if($action=="buscar"){

     $FaturamentoDados = array(
            "codigo_agenda"      => $_POST['codigo_agenda']     ,
            "codigo_paciente"       => $_POST['codigo_paciente']
            );
     
           echo $Faturamento->buscarPorCodigoAgenda($FaturamentoDados);


    
}

if($action=="inserir"){
    
     $FaturamentoDados = array(
            "numeroProntuario"      => $_POST['numeroProntuario']     ,
            "dataAtendimento"       => $_POST['dataAtendimento']      ,
            "codigoConvenio"        => $_POST['codigoConvenio']       ,
            "numeroGuia"            => $_POST['numeroGuia']           ,
            "observacoes"           => $_POST['observacoes']          ,
            "Retorno"               => "false"            , 
            "codigo_convenio_plano" => $_POST['codigo_convenio_plano'],
            "codigo_paciente"       => $_POST['codigo_paciente']
            );
     
           echo $Faturamento->inserir($FaturamentoDados);
}
<<<<<<< HEAD
=======
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

>>>>>>> 93a888ddca13c0ee8187d2fdab3372078eab2f34
