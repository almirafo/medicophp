<!DOCTYPE html>
<!-- https://ciphertrick.com/2015/06/01/search-sort-and-pagination-ngrepeat-angularjs/ -->
<?php header('Access-Control-Allow-Origin: *'); ?>


<script type="text/javascript">
  var host = <?php echo "'".$_SERVER['HTTP_HOST'] ."'";?>

</script>

<html ng-app="pacientesApp">
    <head>
        <meta charset="UTF-8"/>
     <title>Lista de Pacientes</title>

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.8/angular-route.min.js"></script>
                <script src="scripts/modal.js" type="text/javascript"></script>
        <script src="scripts/moment.min.js" type="text/javascript"></script>
        <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="scripts/app/config.js" type="text/javascript"></script>
        <script src="scripts/pacientesApp.js" type="text/javascript"></script>
        <script src="scripts/dirPagination.js" type="text/javascript"></script>
        
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        
    </head>

    <body  ng-controller="pacienteCtrl" style="align-items: center ">
        <div ng-include="'views/navbar.htm'"></div>
                
        <div style="width: 90%;  top:20px; left:130px" >
				
                <form class="form-inline">
                        <div class="form-group">
                            <label >Search</label>
                            <input type="text" ng-model="search" class="form-control" placeholder="procurar">
                            <button type="button" class="btn btn-primary">Novo Paciente</button>
                            <a href="agendamento.html" class="btn btn-info">Agendar Nova Consulta</a>
                        </div>
                </form>
            

               <table class="table table-striped table-hover">
                   <thead>
                       <tr >
                           <th ng-click="sort('nome')">Nome
                           		<span class="glyphicon sort-icon" ng-show="sortKey=='nome'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                           </th>
                           <th >numero Prontuario</th>
                           <th ></th>
                           <th ></th>
                           <th ></th>
                           <th ></th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr dir-paginate="item in pacientes|orderBy:sortKey:reverse |filter:search|itemsPerPage:20">
                           <td>{{item.nome}}</td>
                           <td>{{item.numeroProntuario}}</td>
                           <td><button class="glyphicon glyphicon-paste" data-toggle="modal" data-target="#PlanosModal" ng-click="listaConsultas(item.codigo_paciente)"></button></td>
                           
                           <td><a href='pacienteedita.php?codigo_paciente={{item.codigo_paciente}}&action=buscar' class="btn btn-primary" >Editar</a></td>
                           <td><a href='pacientevisualizar.php?codigo_paciente={{item.codigo_paciente}}&action=buscar' class="btn btn-primary" >Visualizar</a></td>
                           <td><a href="agendamento.html?codigo_paciente={{item.codigo_paciente}}&action=buscar" class="btn btn-info">Agendar Consulta</a></td>
                       </tr>
                   </tbody>
               </table>
               <dir-pagination-controls
                    max-size="20"
                    direction-links="true"
                    boundary-links="true" >
                </dir-pagination-controls>
         </div>
 
        
        
<!-- Modal Ultimas Consultas-->
<div id="PlanosModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ultimas Consultas</h4>
      </div>
      <div class="modal-body">
          <div class="table-responsive">
             <table class="table table-condensed" >
                    <thead>
                        <tr>
                          <th>Data</th>
                          <th>Guia Atendimento</th>
                          <th>Convênio</th>
                        </tr>
                        
                        
                      </thead>
                    <tbody>
                        <tr ng-repeat="consulta in consultas">
                          <td>{{consulta.dataAtendimento}}</td>
                          <td>{{consulta.numeroGuia}}</td>
                          <td>{{consulta.codigoConvenio}}</td>
                        </tr>
                      
                    </tbody>
              </table>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>
        
        
        
        
        
        
    </body>
</html>

