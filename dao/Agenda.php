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
    
    
        public function alterarAgendaStatus($agendaDados){
         $db = $this->getdatabase(); 

            $sql = "update Agendamento set statusAgendamento ='$agendaDados[statusAgendamento]' ".
                    " where codigo_agenda = $agendaDados[codigo_agenda]";

             $db->beginTransaction();

             if($db->prepare($sql)->execute())
                {

                 $db->commit();

                }else{

                    $db_err = $database->errorInfo();
                    echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
                }
        }

        public function getAgendaByMedico($cod_medico){
            $db = $this->getdatabase(); 
            $sql = "SELECT *
            FROM Agendamento where CodigoMedico = $cod_medico order by DataAgendada desc; ";// and DataAgendada>= now()";

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
                                               StatusAgendamento,

                                               NomePaciente      )  ".

                                            "values  ".
                                            "(   '".$agendaDados['numeroProntuario']."' ,  ".    					
                                            "    '". $agendaDados['FoneContato']    ."' ,  ".   
                                            "    '". $agendaDados['Convenio']       ."' ,  ".  
                                            "    ". $agendaDados['codigo_paciente'] ."  ,  ".
                                            "    ". "'".$agendaDados['DataAgendada']."'" ." ,  ".  

                                            "   '". $agendaDados['observacao']   ."' ,  ". 
                                            "    ". $agendaDados['CodigoMedico']   ." ,  ".  

                                            "    ". $agendaDados['Retorno']   ." ,  ".  
                                            "    ". $agendaDados['NovoPaciente']   ." ,  ".  
                                            "    ". $agendaDados['Reagendamento']   ." ,  ".  
                                            "    ". $agendaDados['codigo_convenio_plano']   ." ,  ".      
                                            "   '". $agendaDados[StatusAgendamento]."' ,".

                                            "    '". $agendaDados['NomePaciente']   ."')  ";

             $db->beginTransaction();
             echo $sql;
             if($db->prepare($sql)->execute()){
                 $db->commit();
                    echo 'success'.  $sql;
             }
             else{

                    $db_err = $database->errorInfo();
                    echo $sql.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
             }
        }
        
        
        
        public function buscarPorCodigoAgenda($consultaDados){

            $db = $this->getdatabase(); 
            $sql = "SELECT *
                    FROM Agendamento where codigo_agenda = $consultaDados[codigo_agenda]  ";
            
            $array = $db->query($sql)->fetchAll();
            header("Content-type: application/json; charset=utf-8"); 

            return  json_encode($this->utf8_converter($array));



            
        }
        
        public function  listarByPaciente($consultaDados){
            
            $db = $this->getdatabase(); 
            $sql = "SELECT top 6 *
                    FROM Agendamento where codigo_paciente = $consultaDados[codigo_paciente]  ";
            
            $array = $db->query($sql)->fetchAll();
            header("Content-type: application/json; charset=utf-8"); 

            return  json_encode($this->utf8_converter($array));

            
               
        }
}
