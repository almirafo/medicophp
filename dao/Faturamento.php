<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of faturamento
 *
 * @author almir.oliveira
 */


require '../db/pdoConect.php';


class Faturamento extends dbConnect {

        public function __construct(){
            parent::__construct();
        }

        function utf8_converter($array)
        {
            array_walk_recursive($array, function(&$item, $key){
                if(!mb_detect_encoding($item, 'utf-8', true)){
                        $item = utf8_encode($item);
                }
            });

            return $array;
        }
/*

 *

 *
 *  */


public function listarByConsulta(){
      $sql = "SELECT  faturamento.*, paciente.nome FROM consulta left join faturamento on (consulta.condigo_consulta = faturamento.condigo_consulta)  where consulta.codigo_paciente = $faturamentoDados[codigo_paciente]";

        $db = $this->getdatabase();
        $lista = $db->query($sql);

        $lista = $lista->fetchAll();

    return  json_encode($this->utf8_converter($lista));

}



public function listarByPaciente($codigo_paciente){
      $sql = "SELECT top 6 * FROM faturamento  WHERE  codigo_paciente = $codigo_paciente  ";

        $db = $this->getdatabase();
        $lista = $db->query($sql);


            $lista = $lista->fetchAll();

    return  json_encode($this->utf8_converter($lista));

}

public function deletar($faturamentoDados){
  $sql = "delete from  faturamento where codigo_faturamento = $faturamentoDados[codigo_faturamento]";
        $db = $this->getdatabase();
        $db->prepare($sql)->execute();

}


public function atualizarFaturamento($faturamentoDados){


        $sql = "UPDATE Faturamento SET ".
                       "numeroCartao     ='".$faturamentoDados['numeroCartao'].     "',".
                       "numeroProntuario ='".$faturamentoDados['numeroProntuario']. "',".
                       "DataAtendimento  ='".$faturamentoDados['DataAtendimento'].  "',".
                       "GuiaConsulta     ='".$faturamentoDados['GuiaConsulta'].     "',".
                       "NumCobranca      ='".$faturamentoDados['NumCobranca'].      "',".
                       "DataPagamento    ='".$faturamentoDados['DataPagamento'].    "',".
                       "status           ='".$faturamentoDados['status'].           "',".
                       "obs              ='".$faturamentoDados['obs'].              "',".
                       "codigo_consulta  = ".$faturamentoDados['codigo_consulta'].
                       "		WHERE codigo_faturamento = ".$faturamentoDados['codigo_faturamento'];
echo $sql;

        $db = $this->getdatabase();


        if($db->prepare($sql)->execute()) {
            echo "faturamento atualizado ";
           }else{
               $db_err = $database->errorInfo();
               echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
        }


}

public function inserirFaturamento($faturamentoDados){

        $sql = "INSERT INTO Faturamento ".
               "( numeroProntuario, ".
               "  DataAtendimento, ".
               "  GuiaConsulta, ".
               "  DataPagamento, ".
               "  status, ".
               "  obs, ".
               "  codigo_consulta ".
               ") ".
               
               " VALUES('".$faturamentoDados["numeroProntuario"]."', ".
               "  '".      $faturamentoDados["DataAtendimento"]. "', ".
               "  '".      $faturamentoDados["GuiaConsulta"].    "', ".
               "  '".      $faturamentoDados["DataPagamento"].   "', ".
               "  '".      $faturamentoDados["status"].          "', ".
               "  '".      $faturamentoDados["obs"].             "', ".
               "  ".       $faturamentoDados["codigo_consulta"] .
               " )";

        
       echo $sql;
        $db = $this->getdatabase();


        if($db->prepare($sql)->execute()) {
            echo "faturamento Salvo ";
           }else{
               $db_err = $database->errorInfo();
               echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
        }
    }

}
