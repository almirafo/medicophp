<?php

require '../db/pdoConect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plano
 *
 * @author almir
 */
class Convenio extends dbConnect{
    
    
 function utf8_converter($array)
{
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        }
    });
 
    return $array;
}

       public function listConvenio(){
            

            $db = $this->getdatabase();  
            $sql = "SELECT codigoConvenio as cod_convenio,NomeConvenio as name FROM convenio";
            
            $array = $db->query($sql)->fetchAll();
            header("Content-type: application/json; charset=utf-8"); 
            
          $array= $this->utf8_converter($array);
       return  json_encode($array);
    }
    
    
    
}
