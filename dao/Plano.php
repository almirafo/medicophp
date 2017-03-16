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
class Plano extends dbConnect{
       public function getPlanoByCodigoConvenio($cod_convenio){
            $name = addslashes($cod_convenio); 

            $db = $this->getdatabase();  
            $sql = "Select * from convenio_plano where codigoConvenio = '$name'";
            
            $array = $db->query($sql)->fetchAll();
            header("Content-type: application/json; charset=utf-8"); 

            array_walk_recursive($array, 'toUtf8');

       return  json_encode($array);
    }
    
    
    
    function toUtf8(&$v, $k) {
        $v = utf8_encode($v);
    }

}
