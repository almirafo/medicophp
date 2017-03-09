/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var app = angular.module("agendamentoApp",[]);

app.controller('agendamentoCtrl',function ($scope,$http){
    $scope.paciente =[]; 
    
    $scope.salvar = function(){
        
        $http.get('pacientes.php')
    }
});