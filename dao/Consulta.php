<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Consulta
 *
 * @author almir.oliveira
 */


require '../db/pdoConect.php';


class Consulta extends dbConnect {
    
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
    
        
public function listarByPaciente($codigo_paciente){
    $lista= array(
             array("DataAtendimento"=>'10/08/2016'),
             array("DataAtendimento"=>'10/07/2016'),
             array("DataAtendimento"=>'10/06/2016'),
             array("DataAtendimento"=>'10/05/2016'),
             array("DataAtendimento"=>'10/04/2016')
            );
    
    
    
    return  json_encode($this->utf8_converter($lista));
    
}

public function inserir($consultaDados){

        $sql = "INSERT INTO consulta
                ( numeroProntuario, dataAtendimento, codigoConvenio, numeroGuia, observacoes, Retorno, codigo_convenio_plano, codigo_paciente)".
                "VALUES( '$consultaDados[numeroProntuario]', "
                . "'$consultaDados[dataAtendimento]', "
                . "'$consultaDados[codigoConvenio]', "
                . "'$consultaDados[numeroGuia]', "
                . "'$consultaDados[observacoes]', "
                . "$consultaDados[Retorno], "
                . "$consultaDados[codigo_convenio_plano], "
                . "$consultaDados[codigo_paciente]);";
        $db = $this->getdatabase(); 
        $db->beginTransaction();

        if($db->prepare($sql)->execute()) {
            
            $db->commit();
            echo $sql;
           }else{
               $db_err = $database->errorInfo();
               echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
        }
    }
}
