<?php
require '../dao/UsuarioModel.php'; 
$usuarioModel = new UsuarioModel();
$action = $_GET['action'];
if($action=="logar"){
	$user = $_GET["user"];
	$pwd  = $_GET["password"];
        
    
   $userDados = array(
                "login"    => $user ,
                "password" => $pwd    
                ); 

              
	if ($usuarioModel->findByUserAndPassword($userDados)){
            session_start();
            $_SESSION['user'] =  $user;
            $_SESSION['logged'] = true;
            echo true;

	}

};

if($action=="logout"){
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['logged']);
    echo true;
};

if($action=="verify"){
    
        $login    = isset($_GET['username']) ?$_GET['username'] :$_POST['username'];
        $userDados = array(
                    "login"      => $login);
        
        echo $usuarioModel->verifyUser($userDados);
   	
};

if($action=="registre"){

    
    $login    = isset($_GET['username']) ?$_GET['username'] :$_POST['username'];
    $password = isset($_GET['password']) ?$_GET['password'] :$_POST['password'] ;
    $email    = isset($_GET['email'])    ?$_GET['email']    :$_POST['email'] ;
    $phone    = isset($_GET['phone'])    ?$_GET['phone']    :$_POST['phone'] ;
    
   
    $userDados = array(
                    "login"      => $login);
        
    if( $usuarioModel->verifyUser($userDados)=="false"){
    
    
        $userDados = array(
                         "login"      => $login    ,
                         "password"   => $password , 
                         "email"      => $email    ,  
                         "phone"      => $phone 
                         ); 

         echo $usuarioModel->insertUser($userDados);

    }else{
        echo "99";
    }
    
};

if($action=="create"){
	$usuarioModel->createTable();
};



?>
