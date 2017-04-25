<?php
require '../dao/UsuarioModel.php'; 
$usuarioModel = new UsuarioModel();
$action = $_GET['action'];
if($action=="logar"){
	$user = $_GET["user"];
	$pwd  = $_GET["pwd"];
        
<<<<<<< HEAD
	$login      = isset($_GET['login'])      ?$_GET['login']     :"";
    $password   = isset($_GET['password'])   ?$_GET['password']  :"";
    
   $userDados = array(
		            "login"      => $login    ,
		            "password"   => $password    
					); 

    
	if ($usuarioModel->findByUserAndPassword($userDados)>0){
=======
	//Chama no DAO se tem esse usuário na base
	if ($user === 'admin' &&  $pwd==='1234'){
>>>>>>> e007be89df581f02b2cbd7981292e3bd6e3befa9
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

<<<<<<< HEAD

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
=======
	/*
		insere na tabela usuario.
		coloca usuario na sessão.
		retorna que foi ok para ir a tela de paciente.

	*/
>>>>>>> e007be89df581f02b2cbd7981292e3bd6e3befa9
};



?>
