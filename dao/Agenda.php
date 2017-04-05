<?php
require '../db/pdoConect.php';
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
    
    public function getAgendaByMedico($cod_medico){
        $db = $this->getdatabase(); 
        $sql = "Select * from agendamento where CodigoMedico = $cod_medico";// and DataAgendada>= now()";
        //echo $sql;
        //die;
        $array = $db->query($sql)->fetchAll();
        header("Content-type: application/json; charset=utf-8"); 

        return  json_encode($this->utf8_converter($array));

            
    }
    public function insertAgenda($agendaDados){
        
        $db = $this->getdatabase(); 
                    //"StatusAgendamento     = '$agendaDados[StatusAgendamento]'    ,".
        $sql = "insert into Agendamento (  numeroProntuario ,    					
                                           FoneContato      ,    
					   Convenio         ,  
                                           codigo_paciente  ,
                                           DataAgendada     ,
                                           observacao       ,
                                           CodigoMedico     ,
                                           Retorno          ,
                                           NovoPaciente     ,
                                           Reagendamento    ,
                                           codigo_convenio_plano,


					   NomePaciente      )  ".
                    
					"values  ".
                                        "(   '".$agendaDados['numeroProntuario']."' ,  ".    					
					"    '". $agendaDados['FoneContato']    ."' ,  ".   
					"    '". $agendaDados['Convenio']       ."' ,  ".  
                                        "    ". $agendaDados['codigo_paciente'] ."  ,  ".
                                        "    ". "'".$agendaDados['DataAgendada']."'" ." ,  ".  
                
                                        "    '". $agendaDados['observacao']   ."' ,  ". 
                                        "    ". $agendaDados['CodigoMedico']   ." ,  ".  

                                        "    ". $agendaDados['Retorno']   ." ,  ".  
                                        "    ". $agendaDados['NovoPaciente']   ." ,  ".  
                                        "    ". $agendaDados['Reagendamento']   ." ,  ".  
                                        "    ". $agendaDados['codigo_convenio_plano']   ." ,  ".      
                
                
                                        "    '". $agendaDados['NomePaciente']   ."')  ";
         
             
         
       
         
         
         $db->beginTransaction();
         echo $sql;
         if($db->prepare($sql)->execute())
            {
             
             $db->commit();
                echo 'success'.  $sql;
            }else{

                $db_err = $database->errorInfo();
                echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
            }
        
         
    }
}
