/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

'use strict';

var app = angular.module("pacientesApp",['ngRoute']);

function dataAtualFormatada(date){
    var data = new Date(date);
    var dia = data.getDate();
    if (dia.toString().length == 1)
      dia = "0"+dia;
    var mes = data.getMonth()+1;
    if (mes.toString().length == 1)
      mes = "0"+mes;
    var ano = data.getFullYear();  
    return dia+"/"+mes+"/"+ano;
}


var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


app.controller('pacienteController',['$scope','$http', function ($scope,$http){
         $scope.paciente =[];
          

         $scope.action          = getUrlParameter('action');
         $scope.codigo_paciente = getUrlParameter('codigo_paciente');
         
         $http({
            url:"api/pacienteAPI.php",
            params:{codigo_paciente    :$scope.codigo_paciente,
                    action             :$scope.action
                   },
                   method:"get"
             
         })
         .then(function (response){
                     $scope.paciente = response.data[0];
                     if($scope.paciente.sexo=='F'){
                         $scope.paciente.sexo = "Feminino";
                     }else{
                         $scope.paciente.sexo = "Masculino";
                     }
                     $scope.paciente.nascimento = dataAtualFormatada($scope.paciente.nascimento);
          });
         
            $scope.listaConsultas = function (codigo_paciente){
             $http.get("http://localhost:90/medico/api/consultaAPI.php?action=listarByPaciente&codigo_paciente="+codigo_paciente).then(
                     function(response){
                        $scope.consultas = response.data;
            }) ;
        };
        
        
        $scope.listaAgendamentos =  function (codigo_paciente){
             $http.get("http://localhost:90/medico/api/agendaAPI.php?action=listarByPaciente&codigo_paciente="+codigo_paciente).then(
                     function(response){
                        $scope.agendamentos = response.data;
            }) ;
            
        }

}]);