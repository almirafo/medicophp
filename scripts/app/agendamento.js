/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';

var app = angular.module("agendamentoApp", ['ngSanitize', 'ui.select']);



//Select2 controller - basic
/*
app.controller('selectConvenios', ['$scope', '$http', '$routeParams',
  function ($scope, $http, $routeParams) {
      
    	$http.get("http://localhost:90/medico/convenioAPI.php/buscar/").then(function(response) {
    		$scope.convenios = response.data;
                //$scope.options = ['PAR', 'BRA', 'UNIMED', 'OMINI'];
    	});
      
      
    
  }
]);
*/
app.filter('propsFilter', function() {
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





app.controller('pacienteCtrl', function ($scope, $http, $timeout, $interval) {
  var vm = this;
    $scope.paciente = {};
    $scope.medico={"nome":"Verea","id":"1"};
    $scope.pacientes =[];
    $scope.agenda=[];
  vm.disabled = undefined;
  vm.searchEnabled = undefined;

  vm.setInputFocus = function (){
    $scope.$broadcast('UiSelectDemo1');
  };

  vm.enable = function() {
    vm.disabled = false;
  };

  vm.disable = function() {
    vm.disabled = true;
  };

  vm.enableSearch = function() {
    vm.searchEnabled = true;
  };

  vm.disableSearch = function() {
    vm.searchEnabled = false;
  };

  vm.clear = function() {
    vm.person.selected   = undefined;
    vm.address.selected  = undefined;
    vm.paciente.selected = undefined;
    vm.FoneContato.selected = undefined;
    vm.state.selected    = undefined;
  };
  
  vm.getPaciente =  function (){
      $scope.paciente.nome="Eu";
  };
  
  vm.getPaciente = function(){
      
      vm.paciente = $scope.paciente.selected;
  }
  
  
      vm.salvar = function(){
    	
    	$http.post("http://localhost:90/medico/pacienteAPI.php/salvar").then(
    		function(response){
    			$scope.status = "salvo com sucesso";
    		}	
    	);
    	
    	 $window.location.href = 'pacientes.php';
    };
    
    
    $scope.buscar =  function(nome){
    	 $http.get("http://localhost:90/medico/testeAccess.php?nome="+nome ).then(
            function(response){
                    $scope.pacientes = response.data;
            }) ;
    };

  
  
  
    $scope.showFormAgenda = function() {
            // execute something
            if( $scope.showTheForm){
                $scope.showTheForm = false;
            }else{
                $scope.showTheForm = true;
            }
    };
    
    
    $scope.listaAgenda= function (){
        
        $scope.agenda = [   {"descricao":"lorepruo1", "dia":"01-03-2017","horade":"12:00","horaAte":"12:25"}, 
                            {"descricao":"lorepruo2","dia":"02-03-2017","horade":"12:00","horaAte":"12:25"},
                            {"descricao":"lorepruo3","dia":"03-03-2017","horade":"12:00","horaAte":"12:25"},
                            {"descricao":"lorepruo4","dia":"04-03-2017","horade":"12:00","horaAte":"12:25"},
                            {"descricao":"lorepruo5","dia":"05-03-2017","horade":"12:00","horaAte":"12:25"},
                            {"descricao":"lorepruo6","dia":"06-03-2017","horade":"12:00","horaAte":"12:25"},
                            {"descricao":"lorepruo7","dia":"07-03-2017","horade":"12:00","horaAte":"12:25"}
        ];
        
        
   $scope.delete = function (item) {
    $scope.agenda.splice($scope.agenda.indexOf(item), 1);
}     
        
        
    }
  
    $http.get("http://localhost:90/medico/testeAccess.php" ).then(
            function(response){
                    $scope.pacientes = response.data;
            }) ;
  
   

  });
  
 