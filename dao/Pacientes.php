<?php

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
class Pacientes extends dbConnect{
    public function getByName($name){
       $name = addslashes($name); 
       $conexao = new Conexao();
       $database =$conexao->getdatabase();  
       $sql = "Select nome, codigo_paciente from pacientes where nome like '$name%'";
       $array = $database->query($sql)->fetchAll();
       header("Content-type: application/json; charset=utf-8"); 
       
       array_walk_recursive($array, 'toUtf8');

       return  json_encode($array);
    }

    public function incluir ($paciente){
        
       $conexao = new Conexao();
       $database =$conexao->getdatabase();  
       $sql = "insert into Paciente set  nome = $paciente->nome from pacientes where nome like '$name%'";
       $array = $database->query($sql)->fetchAll();
        
        
    }


    public function find($id){
       $id = addslashes($id); 
       $conexao = new Conexao();
       $database =$conexao->getdatabase();  
       $sql = "Select * from pacientes where nome = $id ";
       $array = $database->query($sql)->fetch();
       header("Content-type: application/json; charset=utf-8"); 
       
       array_walk_recursive($array, 'toUtf8');

       return  json_encode($array);
    }



    
    function toUtf8(&$v, $k) {
        $v = utf8_encode($v);
    }

    
}


