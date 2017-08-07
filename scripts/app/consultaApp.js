/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


'use strict';

var consultaApp = angular.module("consultaApp", ['angularUtils.directives.dirPagination','ngRoute'])
    .run( function($http,$window){
         $http.get("http://localhost:90/medico/api/loginAPI.php?action=logged")
         .then( function(response){
            if(response.data!="1"){
                $window.location.href ="index.php";
            }
         });

    });
var consultaPersistApp = angular.module("consultaPersistApp", [ 'ngSanitize', 'ui.select'])    
    .run( function($http,$window){
         $http.get("http://localhost:90/medico/api/loginAPI.php?action=logged")
         .then( function(response){
            if(response.data!="1"){
                $window.location.href ="index.php";
            }
         });

    });



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
 
    
     $scope.item={};
      $scope.statusFaturamento ={
         availableOptions: [
                            {StatusFaturamento : "PAGO"  },
                            {StatusFaturamento : "GLOSA"},
                            {StatusFaturamento : "PENDENTE"  }
         ]
    };


     $http.get("http://localhost:90/medico/api/consultaAPI.php?action=listar")
     .then(
           function(result){
                   $scope.consultas= result.data;
     }) ;
    
    
    $scope.cobranca     =  function (item) {
       $scope.cobranca.nome = item.nome;
       $scope.cobranca.numeroProntuario = item.numeroProntuario;
       $scope.cobranca.dataAtendimento  = item.dataAtendimento;
       $scope.cobranca.GuiaConsulta     = item.GuiaConsulta;
       $scope.item = item;

       
    }



    $scope.getColor  = function (status){

      if (status=="PAGO"){
        return {'color': 'green'};
      } else if(status=="GLOSA"){
        return {'color': 'red'};
      } else if(status=="PENDENTE"){
        return {'color': 'blue'};
      }else{
        return {'color': 'grey'};
      }

    }

    $scope.salvarCobranca = function (item){

        var acao = "inserir"
        if ($scope.item.GuiaConsulta!=undefined){
          acao ="alterar"
        }


      
        var params1 ={



                       numeroCartao     :$scope.item.numeroCartao,
                       numeroProntuario :$scope.paciente.selected.numeroProntuario,
                       DataAtendimento  :$scope.item.DataAtendimento,
                       GuiaConsulta     :$scope.item.GuiaConsulta,
                       NumCobranca      :'',
                       DataPagamento    :$scope.cobranca.DataPagamento,
                       Status           :$scope.cobranca.status,
                       Obs              :$scope.cobranca.Obs,
                       CODIGO_CONSULTA  :$scope.cobranca.CODIGO_CONSULTA,
                       codigoFaturamento:$scope.cobranca.codigoFaturamento ,
                       action           : acao
                    
                   }


          $http({
                    url    : "api/faturamentoAPI.php",
                    params : params1   ,
                    method : "POST"
             
         })
         .then(function (response){
                $scope.mensagem="salvo!!!";

                $scope.item.GuiaConsulta = $scope.cobranca.GuiaConsulta;
                $scope.item.status       = item.statusFaturamento;
                $scope.cobranca.GuiaConsulta="";
                item.statusFaturamento="";
                $scope.cobranca.status="";
                $scope.consultas.push($scope.item);

          });
          
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