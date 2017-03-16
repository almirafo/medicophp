<?php
class Conexao{
    private $dsn="null";
    private $username="postgres";
    private $password="postgres";
    protected $database;
    public  function  __construct(){
    	$this->conectar();
    }
    
    private function conectar(){

    	$db_username = 'Admin'; //username
    	$db_password = ''; //password
    	
    	//path to database file
    	$database_path = "c:/sistemas/verea_db.accdb";
    	
    	//check file exist before we proceed
    	if (!file_exists($database_path)) {
    		die("Access database file not found !");
    	}
    	
    	//create a new PDO object
    	$this->database = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$database_path; Uid=$db_username; Pwd=$db_password;charset=utf-8");
    	 
    }
    
    
    public function getdatabase(){
    	return $this->database;
    }
    
}
