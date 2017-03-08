<!DOCTYPE html>
<!-- https://ciphertrick.com/2015/06/01/search-sort-and-pagination-ngrepeat-angularjs/ -->

<html ng-app="pacientesApp">
    <head>
        <meta charset="UTF-8"/>
     <title>Lista de Pacientes</title>

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        <script src="scripts/angular.js" type="text/javascript"></script>
        <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="scripts/pacientesApp.js" type="text/javascript"></script>
        <script src="scripts/dirPagination.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        
    </head>

    <body  ng_controller="listar" style="align-items: center ">

        <div style="width: 70%;  top:20px; left:130px">
				
				<form class="form-inline">
				        <div class="form-group">
				            <label >Search</label>
				            <input type="text" ng-model="search" class="form-control" placeholder="Search">
                                            <button type="button" class="btn btn-primary">Novo Paciente</button>
                                            <button type="button" class="btn btn-info">Agendar Consulta</button>
				        </div>
				</form>
            
             <div class="modal-header" ng-show="showTheForm" ng-hide="true" >
               <form  id='editar'>
                <input type="text" placeholder="nome">
                <input type="text" placeholder="Data">
                <button type="button"  ng-click="showForm()" class="btn btn-primary">Salvar</button>
               </form>
              </div>
               <table class="table table-striped table-hover">
                   <thead>
                       <tr >
                           <th ng-click="sort(nome)">Nome
                           		<span class="glyphicon sort-icon" ng-show="sortKey=='nome'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                           </th>
                           <th >numero Prontuario</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr dir-paginate="item in pacientes|orderBy:sortKey:reverse |filter:search|itemsPerPage:20">
                           <td>{{item.nome}}</td>
                           <td>{{item.numeroProntuario}}</td>
                           <td><button type="button" class="btn btn-primary" ng-click="showForm()">Editar</button></td>
                           <td><button type="button" class="btn btn-info">Marcar Consulta</button></td>
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

