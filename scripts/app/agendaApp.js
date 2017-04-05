/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var app = angular.module("agendamentoApp",['angularUtils.directives.dirPagination', 
                                         'ngRoute']                                     
        
        
        )
    .config( function($routeProvider,$locationProvider){
    $routeProvider.when("pacientevisualizar", {
        templateUrl:"pacinentevisualizar.html",
        controller : "pacienteCtrl"
    })
    
    
});



app.controller('agendamentosCtrl',[ '$scope', '$http',  function ($scope, $http ){
        $scope.agendamentos =[];
      
        $http.get("http://localhost:90/medico/api/agendaAPI.php?action=listar").then(
            function(response){
                    $scope.agendamentos = response.data;
            }) ;
    
 
	$scope.sort = function(keyname){
	    $scope.sortKey = keyname;   //set the sortKey to the param passed
	    $scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
}]);


