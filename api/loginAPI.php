<?php
require '../dao/UsuarioModel.php'; 
$usuarioModel = new UsuarioModel();
$action = $_GET['action'];
if($action=="logar"){
	$user = $_GET["user"];
	$pwd  = $_GET["pwd"];
        
	$login      = isset($_GET['login'])      ?$_GET['login']     :"";
    $password   = isset($_GET['password'])   ?$_GET['password']  :"";
    
   $userDados = array(
		            "login"      => $login    ,
		            "password"   => $password    
					); 

    
	if ($usuarioModel->findByUserAndPassword($userDados)>0){
        session_start();
		$_SESSION['user'] =  $user;
		$_SESSION['logged'] = true;
        echo $_SESSION['logged'];
	}

};

if($action=="logout"){
    session_start();
	unset($_SESSION['user']);
	unset($_SESSION['logged']);
        echo true;
};

if($action=="verify"){
	session_start();
	if (isset($_SESSION['logged']) ){
		echo $_SESSION['logged'];
	}
	else{
		echo "false";
	};
};

if($action=="registre"){


	$login      = isset($_GET['login'])      ?$_GET['username']     :$_POST['username'];
    $password   = isset($_GET['password'])   ?$_GET['password']  :$_POST['password'] ;
    $email      = isset($_GET['email'])      ?$_GET['email']     :$_POST['email'] ;
    $phone   = isset($_GET['phone'])   ?$_GET['phone']  :$_POST['phone'] ;
    
   $userDados = array(
		            "login"      => $login    ,
		            "password"   => $password , 
		            "email"      => $email    ,  
		            "phone"      => $phone 
					); 

   $usuarioModel->insertUser($userDados);

};

if($action=="create"){
	$usuarioModel->createTable();
};



?>
