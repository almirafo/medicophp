/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module("pacientesApp",['angularUtils.directives.dirPagination', 
                                         'ngRoute']                                     
        
        
        )
    .config( function($routeProvider,$locationProvider){
    $routeProvider.when("pacientevisualizar", {
        templateUrl:"pacinentevisualizar.html",
        controller : "pacienteCtrl"
    })
    
    
});



app.controller('pacienteCtrl',[ '$scope', '$http',  function ($scope, $http ){
        $scope.pacientes =[];
      
        $http.get("http://localhost:90/medico/testeAccess.php").then(
            function(response){
                    $scope.pacientes = response.data;
            }) ;
    
 
	$scope.sort = function(keyname){
	    $scope.sortKey = keyname;   //set the sortKey to the param passed
	    $scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}

        $scope.showForm = function() { $http.get("http://localhost:90/medico/api/pacienteAPI.php?action=buscar&id="+id).then(
                     function(response){
                        $scope.paciente = response.data;
            }) ;

        }

}]);


