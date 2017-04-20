
<!DOCTYPE html>

<html lang='en'>
<head>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="scripts/app/loginApp.js" type="text/javascript"></script>

     
    <meta charset="UTF-8" /> 
    <title>
        Controle de Agenda Médica e Pacientes 
    </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div ng-app="loginApp"  ng-controller="loginController" id="wrapperRegistre">

	<form  name="registre-form"  id="registre-form"class="registre-form" action="" method="post">
	
		<div class="header">
			<h1>Registre-se</h1>
			<span>Controle de Agenda Médica e Pacientes</span>
		</div>
	
		<div class="content">
			<input name="username" type="text"     class="input username"   placeholder="usuário"  />
			<input name="password" type="password" class="input password"   placeholder="senha"    />
			<input name="email"    type="text"     class="input email"      placeholder="email"    />
			<input name="telefone" type="text"     class="input telefone"   placeholder="telefone" />

			
	        <input type="submit" name="submit"  value="Salvar "  ng-click="registre()" id="salvar" class="salvar" />
			<input type="reset"  name="submit"  value="Limpar "  id="reset"  class="limpar" />
			<input type="submit" name="submit"  value="Sair "    id="sair"   class="sair"   />
		</div>

	</form>

</div>
<div class="gradient"></div>


<script src="scripts/registre.js" type="text/javascript"></script>


</body>
</html>
