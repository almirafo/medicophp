<?php 

//menu.php
/*
 * verificar login
 * 
*/

	$user = $_SESSION.$_GET['user'];
	if (! isset($user) ) {
		exit;
	}

?>


<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        Controle de MÃ©dico
    </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="wrapperMenu">

	<a href="agenda.php"           class="menuItem">Agenda</a>
	<a href="Consulta.php"         class="menuItem">Marcação de Consultas</a>
	<a href="cadastroPaciente.php" class="menuItem">Cadastro de Pacientes</a>	
    <a href="index.php"  id="sair" class="menuItem">Sair</a>

</div>


</body>
    <script src="scripts/menu.js" type="text/javascript"></script>
</html>
