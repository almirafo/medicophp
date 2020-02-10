<!DOCTYPE html>
<!-- https://ciphertrick.com/2015/06/01/search-sort-and-pagination-ngrepeat-angularjs/ -->

<html ng-app="agendamentoApp">
    <head>
        <meta charset="UTF-8"/>
     <title>Lista de Agendamento</title>

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.8/angular-route.min.js"></script>
        
        <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
       
        <script src="scripts/dirPagination.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="scripts/app/config.js" type="text/javascript"></script>
        <script src="scripts/app/agendaApp.js" type="text/javascript"></script>
    </head>

    <body  ng-controller="agendamentosCtrl" style="align-items: center " >
        <div ng-include="'views/navbar.htm'"></div>
                
        <div style="width: 90%;  top:20px; left:130px" >
				
            <form class="form-inline">
                    <div class="form-group">
                        <label >Search</label>
                        <input type="text" ng-model="search" class="form-control" placeholder="Search">
                        <button type="button" class="btn btn-info">Agendar Nova Consulta</button>
                    </div>
            </form>
            

               <table class="table table-striped table-hover">
                   <thead>
                       <tr >
                           <th>Data Agendamento</th>
                           <th ng-click="sort('NomePaciente')">Nome
                           		<span class="glyphicon sort-icon" ng-show="sortKey=='nome'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                           </th>
                           <th>numero Prontuario</th>
                           <th>Status</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr dir-paginate="item in agendamentos|orderBy:sortKey:reverse |filter:search|itemsPerPage:20">
                           <td>{{item.DataAgendada}}</td>
                           <td>{{item.NomePaciente}}</td>
                           <td>{{item.numeroProntuario}}</td>
                           <td>
                               <select ng-change="alterarStatus(item.StatusAgendamento ,item.codigo_agenda)" class="form-control form-control-sm" ng-model="item.StatusAgendamento" ng-value="item.StatusAgendamento"
                                    ng-options="statusAgenda.StatusAgendamento as statusAgenda.StatusAgendamento for statusAgenda in statusAgenda.availableOptions"></select>    

                           </td>
                           <td><a href='pacientevisualizar.html?codigo_paciente={{item.codigo_paciente}}&action=buscar' class="btn btn-primary" >Visualizar Paciente</a></td>
                           <td><a href="agendamento.html?codigo_paciente={{item.codigo_paciente}}&action=buscar&from=listaAgendamento&codigoAgenda={{item.codigo_agenda}}" class="btn btn-info">Confirmar Consulta</a></td>
                       </tr>
                   </tbody>
               </table>
               <dir-pagination-controls
                    max-size="20"
                    direction-links="true"
                    boundary-links="true" >
                </dir-pagination-controls>
         </div>
 
    </body>
</html>

