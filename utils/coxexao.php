<?php

use PDO;

class conexao{
    private $dsn="null";
    private $username="postgres";
    
    
    public function conectar(){
        return new PDO($dsn, $username);
    }
    
}
