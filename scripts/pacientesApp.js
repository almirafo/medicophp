/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var pacientesApp = angular.module("pacientesApp",['angularUtils.directives.dirPagination' ]);

pacientesApp.run( function($http,$window){
 $http.get("http://"+host+"/medico/api/loginAPI.php?action=logged")
 .then( function(response){
    if(response.data!="1"){
        $window.location.href ="index.php";
    }
 })

});


pacientesApp.controller('pacienteCtrl',[ '$scope', '$http', function ($scope, $http){
        $scope.pacientes =[];
        
        $http.get("http://"+host+"/medico/testeAccess.php").then(
            function(response){
                    $scope.pacientes = response.data;
            }) ;
    
 
	$scope.sort = function(keyname){
	    $scope.sortKey = keyname;   //set the sortKey to the param passed
	    $scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}

        $scope.showForm = function() { $http.get("http://"+host+"/medico/api/pacienteAPI.php?action=buscar&id="+id).then(
                     function(response){
                        $scope.paciente = response.data;
            }) ;

        }
     
        
        
        $scope.listaConsultas = function (codigo_paciente){
             $http.get("http://"+host+"/medico/api/consultaAPI.php?action=listarByPaciente&codigo_paciente="+codigo_paciente).then(
                     function(response){
                        $scope.consultas = response.data;
            }) ;
        };
        
        $scope.listaAgendamentos =  function (codigo_paciente){
             $http.get("http://"+host+"/medico/api/agendaAPI.php?action=listarByPaciente&codigo_paciente="+codigo_paciente).then(
                     function(response){
                        $scope.consultas = response.data;
            }) ;
            
        }
        
        
     
}]);


