/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';

var app = angular.module("agendamentoApp", ['ngSanitize', 'ui.select']);


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

app.controller('pacienteCtrl', function ($scope, $http, $timeout, $interval) {
  var vm = this;
    $scope.paciente = {};
    $scope.agendamento = {};
    $scope.paciente.selected ={};
    $scope.pacientes =[];
    $scope.agenda=[];
    $scope.medicos=[];
    //$scope.selectedOption={};
    
    
  /*
   * Carregar se tiver paramentro codigo_paciente
   * 
   */  
   
   $scope.action          = getUrlParameter('action');
   $scope.codigo_paciente = getUrlParameter('codigo_paciente');
   if($scope.codigo_paciente!=null){
    	$http({
            url:"api/pacienteAPI.php",
            params:{codigo_paciente    :$scope.codigo_paciente,
                    action             :$scope.action
                   },
                   method:"get"
             
         })
         .then(function (response){
                $scope.paciente1 = response.data[0];
                $scope.paciente.selected ={};
                $scope.agendamento.nomePaciente=$scope.paciente1.nome;
                $scope.agendamento.ultimaConsulta="";
                $scope.agendamento.CodigoMedico = "1";
                $scope.paciente.selected=$scope.paciente1;
             
             
          });
       
   }
   
    
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
  
  $scope.getPaciente =  function (){
      $scope.agendamento.nomePaciente=$scope.paciente.selected.nome;
      $scope.agendamento.ultimaConsulta="17-01-2017";
      $scope.agendamento.CodigoMedico =1;
  };
  
  
  
    $scope.salvar = function(){
        
        if ($scope.agendamento.data==null){
            
            alert("data de agendamento é obrigatório");
            return;
        }
        
        var params1 ={

                    numeroProntuario      : $scope.paciente.selected.numeroProntuario,
                    FoneContato           : $scope.paciente.selected.fone_res,
                    DataAgendada          : $scope.agendamento.data,
                    Horario               : "null",
                    Convenio              : $scope.paciente.selected.cod_convenio,
                    Retorno               : $scope.agendamento.retorno,
                    NovoPaciente          : $scope.agendamento.novo,
                    NomePaciente          : $scope.agendamento.nomePaciente,
                    Reagendamento         : $scope.agendamento.reagendamento,
                    StatusAgendamento     : "null",
                    codigo_convenio_plano : $scope.agendamento.codigo_convenio_plano,
                    CodigoMedico          : $scope.agendamento.CodigoMedico,
                    codigo_paciente       : $scope.paciente.selected.codigo_paciente,
                    observacao            : $scope.agendamento.observacao,
                    action                : "inserir"
                    
                   }
    	    $http({
                    url    : "api/agendaAPI.php",
                    params : params1   ,
                    method : "POST"
             
         })
         .then(function (response){
             alert(response.data);
                $scope.mensagem="Agendado!!!";
             
          });

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
    
    
    $scope.reservar =  function(){
        $scope.agendamento.data =  moment($scope.agenda.dia).format('DD-MM-YYYY') + " " + moment($scope.agenda.hora).format('HH:mm'); 
    }
    
    
    
    
    
    
    $scope.listaAgenda= function (cod_medico){
      /*
        $http.get("http://localhost:90/medico/api/agendaAPI.php?cod_medico="+cod_medico ).then(
            function(response){
                    $scope.agenda = response.data;
            }) ;
      */
        
        
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
  
  $scope.escolherPlano = function(item1){
      
      $scope.agendamento.codigo_convenio_plano = item1.codigo_convenio_plano
      $scope.agendamento.NomePlano = item1.NomePlano
  }
  
  $scope.getPlano = function (cod_convenio){
       $http.get("http://localhost:90/medico/api/getPlanoAPI.php?cod_convenio="+cod_convenio ).then(
            function(response){
                    $scope.planos = response.data;
            }) ;
  };
  
  
  
    //Lista Medicos
    $http.get("http://localhost:90/medico/api/medicoAPI.php?action=listar" ).then(
            function(response){
                    $scope.medicos = response.data;
            }) ;
    
  
    //Lista Pacientes 
    $http.get("http://localhost:90/medico/testeAccess.php" ).then(
            function(response){
                    $scope.pacientes = response.data;
            }) ;
  
    //lista Convenios
    $http.get("http://localhost:90/medico/api/convenioAPI.php?action=listar" ).then(
                function(response){
                        $scope.convenios
                                = response.data;
                }) ;


     $scope.sexos = {
        availableOptions: [
          {cod_sexo: 'M',   name: 'Masculino'},
          {cod_sexo: 'F', name: 'Feminino'}
        ]

     }
 
 
  });
  
 