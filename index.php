<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        HTML Document Structure
    </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="wrapper">

	<form name="login-form" id="login-form" class="login-form" action="" method="post">
	
		<div class="header">
		<h1>Login</h1>
		<span>Controle de Agenda Médica e Pacientes</span>
		</div>
	
		<div class="content">
		<input name="username" type="text" class="input username" placeholder="usuário" />
		<div class="user-icon"></div>
		<input name="password" type="password" class="input password" placeholder="senha" />
		<div class="pass-icon"></div>		
		</div>

		<div class="footer">
		<input type="submit" name="submit" id="entrar" value="Entrar" class="button"/>
		<input type="submit" name="submit" id="register" value="Registre-se" class="register" />
		</div>
	
	</form>

</div>
<div class="gradient"></div>


<script>

$( "#register" ).click(function() {
  $( "#login-form" ).attr("action","registre.php");
  $( "#login-form" ).submit();
});


$( "#entrar" ).click(function() {
  $( "#login-form" ).attr("action","menu.php");
  $( "#login-form" ).submit();
});
</script>

</body>
</html>
