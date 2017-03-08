/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function() {
    $('#pacientesTable').DataTable();
} );

var app = angular.module("pacientesApp",['angularUtils.directives.dirPagination']);

app.controller('listar',function ($scope, $http){
    $scope.pacientes =[];


    $http.get("http://localhost:90/medico/testeAccess.php").then(
            function(response){
                $scope.pacientes = response.data;
            }) ;
    

	$scope.sort = function(keyname){
	    $scope.sortKey = keyname;   //set the sortKey to the param passed
	    $scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}

        $scope.showForm = function() {
            // execute something
            if( $scope.showTheForm){
                $scope.showTheForm = false;
            }else{
                $scope.showTheForm = true;
            }
        }

});


