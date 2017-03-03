<?php
 
 class RegistreModel extends dbConnect {

    function __construct() {
        
    }
    public function inserir($param) {
        
    }
    public function editar($param) {
        
    }
    public function apagar($param) {
        
    }
    public function selecionar($idUsuario) {
        $sql = "Select * fom usuario where idUsuario = ?";
                $sql = str_replace($sql, "?", $idUsuario) ;
    }
    
    
}
