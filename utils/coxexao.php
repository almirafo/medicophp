<?php

use PDO;

class conexao{
    private $dsn="null";
    private $username="postgres";
    private $password="postgres";
    
    
    public function conectar(){
        return new PDO($dsn, $username,$password);
    }
    
}
