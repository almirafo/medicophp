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

if($action=="alterar"){

     $FaturamentoDados = array(
                       "numeroCartao"       => $_POST['numeroCartao'],
                       "numeroProntuario"   => $_POST['numeroProntuario'],
                       "DataAtendimento"    => $_POST['DataAtendimento'],
                       "GuiaConsulta"       => $_POST['GuiaConsulta'],
                       "NumCobranca"        => $_POST['NumCobranca'],
                       "DataPagamento"      => $_POST['DataPagamento'],
                       "Status"             => $_POST['Status'],
                       "Obs"                => $_POST['Obs'],
                       "CODIGO_CONSULTA"    => $_POST['CODIGO_CONSULTA'],
                       "codigo_faturamento" => $_POST['codigo_faturamento']
            );

           echo $Faturamento->atualizarFaturamento($FaturamentoDados);

}


if($action=="buscarPorPaciente"){

     $FaturamentoDados = array(
                       "numeroProntuario" =>$_POST['numeroProntuario'],
           );
     
      echo $Faturamento->buscarFaturamentoPorPaciente($FaturamentoDados);
    
}

if($action=="inserir"){
    
    $FaturamentoDados = array(
                       "numeroCartao"     =>$_POST['numeroCartao'],
                       "numeroProntuario" =>$_POST['numeroProntuario'],
                       "DataAtendimento"  =>$_POST['DataAtendimento'],
                       "GuiaConsulta"     =>$_POST['GuiaConsulta'],
                       "NumCobranca"      =>$_POST['NumCobranca'],
                       "DataPagamento"    =>$_POST['DataPagamento'],
                       "Status"           =>$_POST['Status'],
                       "Obs"              =>$_POST['Obs'],
                       "CODIGO_CONSULTA"  =>$_POST['CODIGO_CONSULTA']
            );

           echo $Faturamento->inserirFaturamento($FaturamentoDados);
}
