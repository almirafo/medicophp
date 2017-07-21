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


class faturamento extends dbConnect {
    
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
    

public function listar(){
      $sql = "SELECT  faturamento.*, paciente.nome FROM faturamento)";
    
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


public function atualizar($faturamentoDados){


        $sql = "UPDATE Faturamento SET 
                       numeroCartao='$faturamentoDados[numeroCartao]', 
                       numeroProntuario='$faturamentoDados[numeroProntuario]', 
                       DataAtendimento='$faturamentoDados[DataAtendimento]', 
                       GuiaConsulta='$faturamentoDados[GuiaConsulta]', 
                       NumCobranca='$faturamentoDados[NumCobranca]', 
                       DataPagamento='$faturamentoDados[DataPagamento]', 
                       Status='$faturamentoDados[Status]', 
                       Obs='$faturamentoDados[Obs]', 
                       CODIGO_CONSULTA=$faturamentoDados[CODIGO_CONSULTA]
                WHERE codigo_faturamento=$faturamentoDados[codigo_faturamento]";
        
        $db = $this->getdatabase(); 
        

        if($db->prepare($sql)->execute()) {
            echo "faturamento atualizado ";
           }else{
               $db_err = $database->errorInfo();
               echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
        }


}

    public function inserir($faturamentoDados){

        $sql = "INSERT INTO faturamento
                ( numeroProntuario, dataAtendimento, codigoConvenio, numeroGuia, observacoes, Retorno, codigo_convenio_plano, codigo_paciente)".
                "VALUES( '$faturamentoDados[numeroProntuario]', "
                . "'$faturamentoDados[dataAtendimento]', "
                . "'$faturamentoDados[codigoConvenio]', "
                . "'$faturamentoDados[numeroGuia]', "
                . "'$faturamentoDados[observacoes]', "
                . "$faturamentoDados[Retorno], "
                . "$faturamentoDados[codigo_convenio_plano], "
                . "$faturamentoDados[codigo_paciente]);";
        
        $db = $this->getdatabase(); 
        

        if($db->prepare($sql)->execute()) {
            echo "faturamento Salvo ";
           }else{
               $db_err = $database->errorInfo();
               echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
        }
    }
    
}
