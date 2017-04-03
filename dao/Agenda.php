<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Agenda
 *
 * @author almir.oliveira
 */
class Agenda extends dbConnect {
    
    function utf8_converter($array)
    {
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        }
    });
 
    return $array;
    }
    
    public function getAgendaByMedico($cod_medico){
        $db = $this->getdatabase(); 
        $sql = "Select * from agenda where cod_medico = $cod_medico and DataAgendada>= now()";

        $array = $db->query($sql)->fetchAll();
        header("Content-type: application/json; charset=utf-8"); 

        return  json_encode($this->utf8_converter($array));

            
    }
    public function insertAgenda($agendaDados){

        $db = $this->getdatabase(); 
        $sql = "insert into Agendamento set ".
                "cod_medico   = $agendaDados->cod_medico   , ". 
                "DataAgendada = $agendaDados->DataAgendada, ";
                "nomePaciente = $agendaDados->nome";

        $array = $db->prepare($sql)->execute();


        
    }
}
