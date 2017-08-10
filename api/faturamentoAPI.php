<?php

require '../dao/Faturamento.php'; 



$Faturamento  = new Faturamento();
$action = isset($_GET['action'])?$_GET['action']:$_POST['action'];


$numeroProntuario   = isset($_GET['numeroProntuario'])?   $_GET['numeroProntuario']:$_POST['numeroProntuario'];
$DataAtendimento    = isset($_GET['DataAtendimento'])?    $_GET['DataAtendimento']:$_POST['DataAtendimento'];
$GuiaConsulta       = isset($_GET['GuiaConsulta'])?       $_GET['GuiaConsulta']:$_POST['GuiaConsulta'];
$DataPagamento      = isset($_GET['DataPagamento'])?      $_GET['DataPagamento']:$_POST['DataPagamento'];
$Status             = isset($_GET['status'])?             $_GET['status']:$_POST['status'];
$obs                = isset($_GET['obs'])?                $_GET['obs']:$_POST['obs'];
$codigo_consulta    = isset($_GET['codigo_consulta'])?    $_GET['codigo_consulta']:$_POST['codigo_consulta'];
$codigo_faturamento = isset($_GET['codigo_faturamento'])? $_GET['codigo_faturamento']:$_POST['codigo_faturamento'];



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

if($action=="alterar"){

     $FaturamentoDados = array(
                       "numeroProntuario"   => $numeroProntuario,
                       "DataAtendimento"    => $DataAtendimento,
                       "GuiaConsulta"       => $GuiaConsulta,
                       "DataPagamento"      => $DataPagamento,
                       "status"             => $Status,
                       "obs"                => $obs,
                       "codigo_consulta"    => $codigo_consulta,
                       "codigo_faturamento" => $codigo_faturamento
            );
     
           echo $Faturamento->atualizarFaturamento($FaturamentoDados);

}


if($action=="buscarPorPaciente"){

     $FaturamentoDados = array(
     		"numeroProntuario" =>$numeroProntuario,
           );
     
      echo $Faturamento->buscarFaturamentoPorPaciente($FaturamentoDados);
    
}

if($action=="inserir"){
    
	$FaturamentoDados = array(
			"numeroProntuario"   => $numeroProntuario,
			"DataAtendimento"    => $DataAtendimento,
			"GuiaConsulta"       => $GuiaConsulta,
			"DataPagamento"      => $DataPagamento,
			"status"             => $Status,
			"obs"                => $obs,
			"codigo_consulta"    => $codigo_consulta,
			"codigo_faturamento" => $codigo_faturamento
	);
	
   
   echo $Faturamento->inserirFaturamento($FaturamentoDados)[0][0];
}
