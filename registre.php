
<!DOCTYPE html>
<script src="scripts/jquery-3.1.1.min.js" type="text/javascript"></script>

<script src="scripts/registre.js" type="text/javascript"></script>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
        HTML Document Structure
    </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="wrapperRegistre">

	<form name="registre-form"  id="registre-form"class="registre-form" action="" method="post">
	
		<div class="header">
		<h1>Registre-se</h1>
		<span>Controle de Agenda Médica e Pacientes</span>
		</div>
	
		<div class="content">
		<input name="username" type="text" class="input username" placeholder="usuário" />
		
		<input name="password" type="password" class="input password" placeholder="senha" />
		
		<input name="email" type="text" class="input email" placeholder="email" />
		
		<input name="telefone" type="text" class="input telefone" placeholder="telefone" />
		

		
                <input type="submit" name="submit" value="Salvar" onclick="" id="salvar" class="salvar" />
		<input type="reset"  name="submit"  value="Limpar" id="reset" class="limpar" />
		<input type="submit" name="submit" value="Sair"    id="sair"  class="sair" />
		</div>

	</form>

</div>
<div class="gradient"></div>





</body>
</html>
