<?
require '../dao/UsuarioModel.php'; 

//$action =  isset($_GET['action'])? $_GET['action'] :isset($_POST['action'])?$_POST['action']:"";
$usuarioModel  = new UsuarioModel();
$action = $_GET['action'];
if($action=="verify"){
    
   $login      = isset($_GET['login'])      ?$_GET['login']     :"";
   $userDados = array(
		            "login"      => $login    
					); 

    echo $usuarioModel->verifyUser($userDados);
};

if($action=="insert"){
    
                    $login      = isset($_GET['login'])      ?$_GET['login']     :"";
                    $password   = isset($_GET['password'])   ?$_GET['password']  :"";
                    $email      = isset($_GET['email'])      ?$_GET['email']     :"";
                    $phone      = isset($_GET['phone'])      ?$_GET['phone']     :"";
    
   $userDados = array(
		            "login"      => $login    ,
                    "password"   => $password ,
                    "email"      => $email    ,
                    "phone"      => $phone       
					); 
   
   
   $usuarioModel->insertUser($userDados); 

};

if($action=="find"){
    
   $login      = isset($_GET['login'])      ?$_GET['login']     :"";
   $password   = isset($_GET['password'])   ?$_GET['password']  :"";
    
   $userDados = array(
		            "login"      => $login    ,
		            "password"   => $password    
					); 
    echo $usuarioModel->findByUserAndPassword($userDados);};
?>