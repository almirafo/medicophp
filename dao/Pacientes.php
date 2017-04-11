<?php
require '../db/pdoConect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pacientes
 *
 * @author almir.oliveira
 */
class Pacientes extends dbConnect {
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
    
    
    public function getByName($name){
       $name = addslashes($name); 
       
       $database =  $this->getdatabase();
       $sql = "Select nome, codigo_paciente from pacientes where nome like '$name%'";
       $array = $database->query($sql)->fetchAll();
       header("Content-type: application/json; charset=utf-8"); 
       
       array_walk_recursive($array, 'toUtf8');

       return  json_encode($array);
    }

    public function incluir ($paciente){
        
       
       $database =  $this->getdatabase();
       $sql = "insert into Paciente set  nome = $paciente->nome from pacientes where nome like '$name%'";
       $array = $database->query($sql)->fetchAll();
        
        
    }

    public function pacienteUltimaConsulta($codigo_paciente){
        $database =  $this->getdatabase();
         $sql = "select paciente.*, consulta.dataAtendimento from paciente LEFT JOIN consulta ON ( paciente.codigo_paciente =  consulta.codigo_paciente) 
                where paciente.codigo_paciente = $codigo_paciente 
                and consulta.dataAtendimento =(select max (dataAtendimento) from consulta  WHERE  codigo_paciente = $codigo_paciente ) ";
         
       $array = $database->prepare($sql);
       $array->execute();
       
       $_array = $array->fetchAll();
       header("Content-type: application/json; charset=utf-8"); 
       $_array = $this->utf8_converter($_array);
      
       return  json_encode($_array);
       
    }

    public function find($id){
       $id = addslashes($id); 
         
       $database =  $this->getdatabase();  
       $sql = "SELECT * FROM paciente where codigo_paciente = $id ";
       $array = $database->prepare($sql);
       $array->execute();
       
       $_array = $array->fetchAll();
       header("Content-type: application/json; charset=utf-8"); 
       $_array = $this->utf8_converter($_array);
      
       return  json_encode($_array);
    }

}


