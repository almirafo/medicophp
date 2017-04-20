<!DOCTYPE html>


<html>
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

<div id="wrapper">

    <form  ng-app="loginApp"  ng-controller="loginController"  name="login-form" id="login-form" class="login-form"  method="post">
                                  
                                    
		<div class="header">
            <h1>Login</h1>
            <span>Controle de Agenda Médica e Pacientes</span>
        </div>
	
		<div class="content">
    		<input name="user" type="text"      ng-model="user" class="input username" placeholder="usuário" />
    		<div class="user-icon"></div>
            <input name="pwd" type="password"  ng-model="pwd"      class="input password" placeholder="senha" />
    		<div class="pass-icon"></div>		
		</div>

		<div class="footer">
		
		   <input type="submit"  name="submit"  id="register" value="Registre-se" class="register" />
           <input type="submit"  name="submit"  ng-click="logar()" id="entrar" value="Entrar" class="button"/>
		</div>
	
	</form>

</div>
<div class="gradient"></div>


<script src="scripts/registre.js" type="text/javascript"></script>

</body>
</html>
