<?php
require '../db/pdoConect.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioModel
 *
 * @author almir.oliveira
 */
class UsuarioModel extends  dbConnect {
	  /*  CREATE TABLE user (
		id_user INTEGER NOT NULL,
		login VARCHAR(10),
		password VARCHAR(10),
		email    VARCHAR(50),
		phone    VARCHAR(50),
		CONSTRAINT USER_PK_0001 PRIMARY KEY (id_user)
	    );*/


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
    



        public function createTable(){

        try {
         $db = $this->getdatabase(); 
         $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

             $sql="CREATE TABLE user (
                                            id_user INTEGER NOT NULL,
                                            login VARCHAR(10),
                                            password VARCHAR(10),
                                            email    VARCHAR(50),
                                            phone    VARCHAR(50),
                                            CONSTRAINT USER_PK_0001 PRIMARY KEY (id_user)
                                            )";
             
             $db->exec($sql);
        }
        catch(PDOException $e) {
                    echo $e->getMessage();//Remove or change message in production code
        } 

                
        }






        public function verifyUser($userDados){
    	 $sqlVerifyUser ="SELECT * FROM user WHERE login = '$userDados->login'";

         $db = $this->getdatabase(); 
             $db->beginTransaction();
            $array = $db->query($sqlVerifyUser)->fetchAll();
            header("Content-type: application/json; charset=utf-8"); 
            return  json_encode($this->utf8_converter($array));

        }


        public function insertUser($userDados){

    	$sqlInsertUser ="insert into user  (login,
													password ,
													email    ,
													phone    ) 
													values 
													('$userDados->login',
													'$userDados->password' ,
													'$userDados->email'    ,
													'$userDados->phone'    ) ";
         try {
             $db = $this->getdatabase(); 
             $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
             
             $db->beginTransaction();
             if($db->exec($sqlInsertUser))
                {

                 echo $e->getMessage();   
                 $db->commit();

                }else{

                    $db_err = $database->errorInfo();
                    echo $sqlInsertUser.' Error : ('. $db_err[0] .') -- ' . $db_err[2];
                }    
         }  catch(PDOException $e) {
                    echo $e->getMessage();
         } 

         
        }

        public function findByUserAndPassword($userDados){

		 $login    = $userDados->login;
		 $password = $userDados->password;
	     $sqlFindByUserAndPassword ="SELECT * FROM user WHERE login = '$login' AND password = '$password'";


         $db = $this->getdatabase(); 
 
           
            $array = $db->query($sqlFindByUserAndPassword)->fetchAll();
            header("Content-type: application/json; charset=utf-8"); 

            return  array_count_values($array);


        }




}
