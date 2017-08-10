<?php

require '../dao/Faturamento.php'; 



$Faturamento  = new Faturamento();
$action = isset($_GET['action'])?$_GET['action']:$_POST['action'];

$numeroCartao       = isset($_GET['numeroCartao'])?       $_GET['numeroCartao']:$_POST['numeroCartao'];
$numeroProntuario   = isset($_GET['numeroProntuario'])?   $_GET['numeroProntuario']:$_POST['numeroProntuario'];
$DataAtendimento    = isset($_GET['DataAtendimento'])?    $_GET['DataAtendimento']:$_POST['DataAtendimento'];
$GuiaConsulta       = isset($_GET['GuiaConsulta'])?       $_GET['GuiaConsulta']:$_POST['GuiaConsulta'];
$NumCobranca        = isset($_GET['NumCobranca'])?        $_GET['NumCobranca']:$_POST['NumCobranca'];
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
                       "numeroCartao"       => $numeroCartao,
                       "numeroProntuario"   => $numeroProntuario,
                       "DataAtendimento"    => $DataAtendimento,
                       "GuiaConsulta"       => $GuiaConsulta,
                       "NumCobranca"        => $NumCobranca,
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
			"numeroCartao"       => $numeroCartao,
			"numeroProntuario"   => $numeroProntuario,
			"DataAtendimento"    => $DataAtendimento,
			"GuiaConsulta"       => $GuiaConsulta,
			"NumCobranca"        => $NumCobranca,
			"DataPagamento"      => $DataPagamento,
			"status"             => $Status,
			"obs"                => $obs,
			"codigo_consulta"    => $codigo_consulta,
			"codigo_faturamento" => $codigo_faturamento
	);
	
  print_r( $Faturamento->inserirFaturamento($FaturamentoDados));
   //echo $Faturamento->inserirFaturamento($FaturamentoDados);
}
