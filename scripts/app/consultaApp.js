/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


'use strict';

var consultaApp = angular.module("consultaApp", ['angularUtils.directives.dirPagination', 
                                         'ngRoute']);
var consultaPersistApp = angular.module("consultaPersistApp", [ 'ngSanitize', 'ui.select']);



window.routes =
{
    
    "/login": {
        templateUrl: 'login.php', 
        requireLogin: true
                 },
    
    
    "/pacientes": {
        templateUrl: 'pacientes.php', 
        controller: 'WelcomeCtrl', 
        requireLogin: true
                  },
    "/pacientesvisualizar": {
        templateUrl: 'pacientesvisualizar.html', 
        controller: 'WelcomeCtrl', 
        requireLogin: true
                  },     

    "/agendamentos": {
        templateUrl : 'agendamentos.html', 
        controller  : 'WelcomeCtrl', 
        requireLogin: true
                  },    
    
    "/agendamento": {
        templateUrl : 'agendamento.html', 
        controller  : 'UserDetailsCtrl', 
        requireLogin: true
                  },
    "/consultas": {
        templateUrl : 'consultas.html', 
        controller  : 'UserDetailsCtrl', 
        requireLogin: true
                  }              
                  
                  
};



consultaApp.filter('propsFilter', function() {
  return function(items, props) {
    var out = [];
    if (angular.isArray(items)) {
      items.forEach(function(item) {
        var itemMatches = false;
        var keys = Object.keys(props);
        for (var i = 0; i < keys.length; i++) {
          var prop = keys[i];
          var text = props[prop].toLowerCase();
          if (item[prop].toString().toLowerCase().indexOf(text) !== -1) {
            itemMatches = true;
            break;
          }
        }
        if (itemMatches) {
          out.push(item);
        }
      });
    } else {
      // Let the output be the input untouched
      out = items;
    }
    return out;
  }
});



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

consultaApp.controller('consultaCtrl', function ($scope, $http, $timeout, $interval) {
    
     $scope.consulta          = {};
     
     
     $http.get("http://localhost:90/medico/api/consultaAPI.php?action=listar")
     .then(
           function(result){
                   $scope.consultas= result.data;
     }) ;
    
    
    
    
    
});

consultaPersistApp.run( function($rootScope,$window){
   if ($rootScope.logged)
         $window.location.href ="pacientes.php";
    else{
        $window.location.href = 'index.php';
        }
});


consultaPersistApp.controller('consultaPersist', function ($scope, $http) {
    $scope.consulta          = {};
    $scope.buscar = function(nome ){
        var paciente ={};
        paciente.nome= "almir";
        paciente.numeroProntuario= "BRA 1223 1231";
        $scope.consulta.idConsulta = 1;
        $scope.consulta.paciente = paciente;
        $scope.consulta.dataAtendimento="01-01-2018";
    }
    
    
    
    
});