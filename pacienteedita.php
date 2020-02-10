<!DOCTYPE html>
<?php header('Access-Control-Allow-Origin: *'); ?>

<script type="text/javascript">
  var host = <?php echo "'".$_SERVER['HTTP_HOST'] ."'";?>

</script>
<html ng-app="pacientesApp">
    <head>
        <title>Paciente</title>
        <meta charset="UTF-8">
        

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-sanitize.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.8/angular-route.js"></script>
        
        <script src="scripts/modal.js" type="text/javascript"></script>
        <script src="scripts/moment.min.js" type="text/javascript"></script>
        <script src="scripts/select.js" type="text/javascript"></script>
        <link href="css/select.css" rel="stylesheet" type="text/css"/>
        
         <script src="scripts/app/paciente.js" type="text/javascript"></script>
    </head>
    <body ng-controller="pacienteController">
    <div ng-include="'views/navbar.htm'"></div>
       
        <form id="visualizarPaciente">
             <div class="form-group row" >
                    <div class="col-sm-3  col-form-label col-form-label-sm"> Código : {{paciente.codigo_paciente}}</div>
                    
                    <div class="col-sm-3  col-form-label col-form-label-sm">Cartão:   {{paciente.numeroCartao}}</div>
                    <div class="col-sm-3  col-form-label col-form-label-sm">Convenio: {{paciente.cod_convenio}}</div>
                    <div class="col-sm-3  col-form-label col-form-label-sm">Plano:    {{paciente.codigo_convenio_plano}}</div>
             </div>

            <div class="form-group row" >
              <div class="col-sm-3">Nome: <input id="nomePaciente" class="form-control form-control-sm" required ng-model="paciente.nome" placeholder="Nome do Paciente"></div>
              <div class="col-sm-3">Nascimento: <input id="nascimentoPaciente" class="form-control form-control-sm" required ng-model="paciente.nascimento" placeholder="nascimento"></div>
              <div class="col-sm-3">Local: <input id="localNascimento" type="date" class="form-control form-control-sm" required  date-picker-input ng-model="paciente.local_nascimento" placeholder="local nascimento"> </div>
              <div class="col-sm-3">Sexo: 
              <select class="form-control form-control-sm"  ng-model='paciente.sexo' ng-selected="paciente.sexo">
                <option disabled>Selecine</option>
                <option  value="Masculino">Masculino</option>
                <option  value="Feminino">Feminino</option>
              </select>
              </div>
            </div>
            
            <div class="form-group row" >  
              <div class="col-sm-6">Estado Civil: <input class="form-control form-control-sm"  ng-model="paciente.estado_civil"/> </div>
              <div class="col-sm-6">Filhos :<input class="form-control form-control-sm"  ng-model="paciente.filhos" /> </div>
            </div>
            <div class="form-group row" >    
              <div class="col-sm-4">RG:<input class="form-control form-control-sm"  ng-model="paciente.rg" /></div>
              <div class="col-sm-4">CPF:<input class="form-control form-control-sm"  ng-model="paciente.cpf" /></div>
              <div class="col-sm-4">Enviado por: <input class="form-control form-control-sm"  ng-model="paciente.enviado_por" /></div>
            </div>  
              
            <div class="form-group row" >
              <div class="col-sm-2">Celular: {{paciente.celular}}</div>
              <div class="col-sm-2"> <img ng-src="images/jobIco.png" height="20" width="20"/> {{paciente.profissao}}</div>
              
              <div class="col-sm-2">{{paciente.cargo}}</div>
              <div class="col-sm-2">{{paciente.atividade}}</div>
              <div class="col-sm-2">{{paciente.empresa}}</div>
            </div> 
            
            
            <div class="form-group row" >
                <div class="col-sm-2">Motivo da Consulta: {{paciente.motivo}}</div>
                <div class="col-sm-6"> <span class=" glyphicon glyphicon-envelope"> {{paciente.email}}</span></div>
            </div>
              

       </form>
    </body>
</html>