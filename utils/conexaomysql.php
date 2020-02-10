<?php
class Conexao{
    private $dsn="mysql:dbname=vereadb;host=localhost";
    private $username="root";
    private $password="";
    protected $database;
    public  function  __construct(){
    	$this->conectar();
    }
    
    private function conectar(){

    	$db_username = 'root'; //username
    	$db_password = ''; //password
    	
    	//path to database file
    	$database_path = "mysql:dbname=vereadb;host=localhost";
    	
    	//check file exist before we proceed
    	//if (!file_exists($database_path)) {
    	//	die("Access database file not found !");
    	//}
    	
    	//create a new PDO object
    	$this->database = new PDO($database_path,$db_username,$db_password);
    	 
    }
    
    
    public function getdatabase(){
    	return $this->database;
    }
    
}
