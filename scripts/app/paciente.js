/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

'use strict';

var app = angular.module("pacientesApp",['ngRoute']);




app.controller('pacienteController',['$scope','$http','$location', function ($scope,$http,$location){
         $scope.paciente =[];
          
         //$location.path('/?id=1080');

         console.log($location.path()); // logs: '/?id=1080'
         console.log(spyOn($location, 'search').andReturn({ id: action })); // logs: undefined
         
         
         
         $http({
            url:"api/pacienteAPI.php",
            params:{id    :$location.search().id,
                    action:$location.search().action
                   },
                   method:"get"
             
         })
                 .then(function (response){
                     $scope.paciente = response.data;
                 })
         
         /*
         $http.get("http://localhost:90/medico/api/pacienteAPI.php?action=buscar&id="+1).then(
         function(response){
                    $scope.paciente = response.data;
         }) ;
           */ 
            
 
                    

}]);