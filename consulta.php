<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php header('Access-Control-Allow-Origin: *'); ?>


<script type="text/javascript">
  var host = <?php echo "'".$_SERVER['HTTP_HOST'] ."'";?>

</script>   
    <head>
        <meta charset="UTF-8"/>
        <title>Consulta</title>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-sanitize.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="scripts/modal.js" type="text/javascript"></script>
        <script src="scripts/moment.min.js" type="text/javascript"></script>
        <script src="scripts/select.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href="css/select.css" rel="stylesheet" type="text/css"/>
                <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
       
        <script src="scripts/dirPagination.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
       
        <script src="scripts/app/consultaApp.js" type="text/javascript"></script>
    </head>
    
    <body>
        <div ng-app="consultaPersistApp" ng-controller="consultaPersist as consultaController" ng-open="consultaController.buscar()" >
            <div ng-include="'views/navbar.htm'"></div>
            <p>{{consulta.paciente.nome}}                 </p>
            <p>{{consulta.dataAtendimento}}              </p>
            <p>{{consulta.paciente.numeroProntuario}}</p>
            
            
        </div>
    </body>
</html>
