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
    

public function listar(){


         $sql ="select p.codigo_paciente,p.nome, c.numeroProntuario,c.dataAtendimento,c.codigo_consulta,c.codigoConvenio ,f.GuiaConsulta,f.status,f.codigo_faturamento ,f.obs , f.DataPagamento".       
        " from (( paciente  p inner join consulta    c on p.codigo_paciente = c.codigo_paciente ) ".
        "                              left join Faturamento f on c.codigo_consulta = f.codigo_consulta ) ".
        " WHERE c.codigoConvenio<>'PAR'   ".                           
        "          order by c.dataAtendimento desc ";



        $db = $this->getdatabase(); 
        $lista = $db->query($sql);

            $lista = $lista->fetchAll();
    
    return  json_encode($this->utf8_converter($lista));
    
}


        
public function listarByPaciente($codigo_paciente){
      $sql = "SELECT * FROM consulta  WHERE  codigo_paciente = $codigo_paciente  ";
    
        $db = $this->getdatabase(); 
        $lista = $db->query($sql);

        
            $lista = $lista->fetchAll();
    
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
        

        if($db->prepare($sql)->execute()) {
            echo "Consulta Gerada prontuário : $consultaDados[numeroProntuario]";
           }else{
               $db_err = $database->errorInfo();
               echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
        }
    }
    
    public function ultimaConsulta($consultaDados){
        
       $sql = " select * from consulta " .
              " where codigo_paciente = $consultaDados[codigo_paciente] " .
              " and dataAtendimento =(select max (dataAtendimento) from consulta  WHERE  codigo_paciente = $consultaDados[codigo_paciente] ) ";
        
                $db = $this->getdatabase(); 
       
                $array = $db->query($sql)->fetchAll();
                return  json_encode($array);
        }
        
        public function buscarPorCodigoAgenda($consultaDados){
            $sql = " select * from consulta " .
              " where codigo_paciente = $consultaDados[codigo_paciente] " .
              " and dataAtendimento =(select max (dataAtendimento) from consulta  WHERE  codigo_paciente = $consultaDados[codigo_paciente] ) ";
        
                $db = $this->getdatabase(); 
       
                $array = $db->query($sql)->fetchAll();
                
                return  json_encode($array);
        }
    
}
