<?php
//require '../dao/User.php';

$action = $_GET['action'];
if($action=="logar"){
	$user = $_GET["user"];
	$pwd  = $_GET["pwd"];
        
	//Chama no DAO se tem esse usuário na base
	if ($user === 'admin' &&  $pwd==='1234'){
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

	/*
		insere na tabela usuario.
		coloca usuario na sessão.
		retorna que foi ok para ir a tela de paciente.

	*/
};



?>
