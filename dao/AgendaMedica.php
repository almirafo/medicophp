<?php
require '../db/pdoConect.php';

class AgendaMedica extends  dbConnect {
	
      /*
        CREATE TABLE `AgendaMedica` (
                `codigo_agenda` SMALLINT NOT NULL,
                `assunto` VARCHAR(255),
                `dataInicio` TIMESTAMP,
                `dataFim` TIMESTAMP,
                `Horario` TIMESTAMP,
                `TipoAssunto` SMALLINT,
                `CodigoMedico` SMALLINT,
                CONSTRAINT SYS_PK_AGENDAMEDICA PRIMARY KEY (`codigo_agenda`)
        ) ;
        CREATE UNIQUE INDEX SYS_IDX_SYS_PK_AGENDAMEDICA_11014 ON `AgendaMedica` (codigo_agenda) ;

       **/
    
    
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
    
    
    public function montagemDaAgenda($periodo){
    
     $dataInicio   = $periodo['dataInicio'];
     $dataFim      = $periodo['dataFim']; 
     $codigoMedico = $periodo['codigoMedico'];   
     $sql = "    
     

      SELECT `codigo_agenda`, `assunto`,
       ( (CLng( DatePart ('h', `dataFim`))    + CLng(Format( DatePart ('n', `dataFim`),'00000.0000'))/60.00) -
         (CLng( DatePart ('h', `dataInicio`)) + CLng(Format( DatePart ('n', `dataInicio`),'00000.0000'))/60.00)
        
	   ) *4  AS periodos,	

        CLng( DatePart ('h', `dataFim`))    + CLng(Format( DatePart ('n', `dataFim`),'00000.0000'))/60.00 ,
        CLng( DatePart ('h', `dataInicio`)) + CLng(Format( DatePart ('n', `dataInicio`),'00000.0000'))/60.00,
        
       
       `dataInicio`, 
       `dataFim`, 
       `Horario`, 
       `CodigoMedico`
        FROM `AgendaMedica` 
        where dataInicio between $dataInicio and $dataFim
        and  CodigoMedico = $codigoMedico   
     ";
    
    
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

