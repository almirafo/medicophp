<?
require '../db/pdoConect.php';
/*

Calenderio de compromissos do médico


*/
/**
 * Description of Agenda
 *
 * @author almir.oliveira
 */
class CompromissoMedico extends dbConnect {

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
    
 	public function alterarCompromisso($compromissoDados){

 	}

 	public function listarCompromisso($compromissoDados){

 	}

 	public function listarPorPeriodo($compromissoDados){

 	}

 	public function inserirCompromisso($compromissoDados){

 	}


 	public function apagarCompromisso($compromissoDados){

 	}




}

