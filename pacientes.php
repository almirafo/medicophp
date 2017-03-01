<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
<?php/*
       <script src="scripts/angular.min.js" type="text/javascript"></script>
       <script src="scripts/jquery-3.1.1.min.js" type="text/javascript"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.6.0/angular-datatables.min.js"></script>
        
        <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
        <link href="scripts/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
       
       
       
       
       <script src="scripts/pacientesApp.js" type="text/javascript"></script>
       */
     ?>   
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
        <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="scripts/pacientesApp.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" class="init">
	        $(document).ready(function() {
                        $('#example').DataTable();
                } );
</script>
    </head>

    <body ng-app="pacientesApp"  ng_controller="listar" style="align-items: center ">

        <div style="width: 70%;">
               <input class="form-control" ng-model="searchText" placeholder="Search" type="search" ng-change="search()" /> 
               <span class="input-group-addon">
               <span class="glyphicon glyphicon-search"></span>
               </span>
               <table id="pacientesTable">
                   <thead>
                       <tr>
                           <th class="nome"> <a ng-click="ng-click="sortType = 'nome' ; sortReverse = !sortReverse" href="#"> Nome
                                <span class="nome"></span></a>
                           </th>
                           <th class="numeroProntuario"> <a ng-click="sort('numeroProntuario')" href="#"> numero Prontuario
                            <span class="numeroProntuario"></span></a>
                           </th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr ng-repeat="item in pacientes">
                           <td>{{item.nome}}</td>
                           <td>{{item.numeroProntuario}}</td>
                       </tr>
                   </tbody>
               </table>

               <ul class="pagination pagination-sm">
                   <li ng-class="{active:0}"><a href="#" ng-click="firstPage()">First</a></li>
                   <li ng-repeat="n in range(ItemsByPage.length)"> <a href="#" ng-click="setPage()" ng-bind="n+1">1</a></li>
                   <li><a href="#" ng-click="lastPage()">Last</a></li>
               </ul>

         </div>
 
    </body>
</html>

<?php
/*
<table class="table  table-hover data-table myTable" datatable="ng" at-table at-paginated at-list="filteredList" at-config="config">
    <thead>
      <tr><th>Nome</th><th>Numero Prontuário</th><th>Action</th></tr>
    </thead>
    <tbody>
      <tr ng-repeat="x in pacientes">
        
        <td>
          {{x.nome}}
        </td>
        <td>{{x.numeroProntuario}}</td>
        <td>
            <div class="btn-group">
                <button type="button" class="btn btn-default btn" ng-click="edit($index);"><i class="glyphicon glyphicon-pencil"></i></button>  
                <button type="button" class="btn btn-default btn" ng-click="delete();"><i class="glyphicon glyphicon-trash"></i></button> 
            </div>
        </td>
      </tr>
    </tbody>
  </table>
    
*/

?>