/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var app = angular.module("agendamentoApp",[]);

app.controller('agendamentoCtrl',function ($scope,$http,$window){
    $scope.paciente =[]; 
    
    
    $scope.salvar = function(){
    	
    	$http.post("http://localhost:90/medico/pacienteAPI.php/salvar").then(
    		function(response){
    			$scope.status = "salvo com sucesso";
    		}	
    	);
    	
    	 $window.location.href = 'pacientes.php';
    };
    
    
    $scope.buscar =  function(id){
    	$http.get("http://localhost:90/medico/pacienteAPI.php/buscar/"+id).then(function(response) {
    		$scope.paciente = response.data;
    	});
    };
});