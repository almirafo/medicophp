<?php

class dbConnect {
	
	
    
    
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
    	$this->database = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$database_path; Uid=$db_username; Pwd=$db_password");
        $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*
            $db = 'C:\\sistemas\\verea_db.accdb';
            $conn = new COM('ADODB.Connection');
            $conn->Open("DRIVER={Driver do Microsoft Access (*.mdb)}; DBQ=$db");
            $this->database =$conn; 
        */
        
        
        
    }
    
    
    public function getdatabase(){
    	return $this->database;
    }
    
	
	  
};

