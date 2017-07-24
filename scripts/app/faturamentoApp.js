/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var faturamentoapp = angular.module("faturamentoApp",['angularUtils.directives.dirPagination'  ] )
    .run( function($http,$window){
 $http.get("http://localhost:90/medico/api/loginAPI.php?action=logged")
 .then( function(response){
    SSSS
    if(response.data!="1"){
        $window.location.href ="index.php";
    }
 })
    });




faturamentoapp.controller('faturamentosCtrl',[ '$scope', '$http',  function ($scope, $http ){
        $scope.faturamentos =[];
      
      $scope.listarByPaciente  = function(codigo_paciente){

        $http.get("http://localhost:90/medico/api/faturamentoAPI.php?action=listar&codigo_paciente="+codigo_paciente).then(
            function(response){
                    $scope.faturamentos = response.data;
            }) ;
    
       } 
 
        $scope.salvar = function(status,codigo_faturamento,codigo_consulta){
            action=""
            if ($scope.consulta.selected.codigo_faturamento!=null){
                action="incluir"
            } else{
                action="alterar"
            }  



            var params1 ={

                            numeroProntuario      : $scope.consulta.selected.numeroProntuario,
                            numeroCartao          : $scope.consulta.selected.numeroCartao,
                            codigo_consulta       : $scope.consulta.selected.codigo_consulta,
                            DataAgendada          : $scope.consulta.selected.data,
                            DataPagamento         : $scope.consulta.selected.DataPagamento,
                            status                : $scope.consulta.selected.status,
                            observacao            : $scope.consulta.selected.observacao,
                            action                : action
                            
                           }
                    $http({
                            url    : "api/faturamentoAPI.php",
                            params : params1   ,
                            method : "POST"
                     
                 })
                 .then(function (response){
                        $scope.mensagem="Salvo!!!";
                  });

        }    
 
	$scope.sort = function(keyname){
	    $scope.sortKey = keyname;   //set the sortKey to the param passed
	    $scope.reverse = !$scope.reverse; //if true make it false and vice versa
	}
        
        $scope.statusfaturamento ={
         availableOptions: [
                            {Statusfaturamento : "pago"  },
                            {Statusfaturamento : "aguardando"  },
                            {Statusfaturamento : "aberto"},
                            {Statusfaturamento : "glosa"  }
         ]
     }
        
        
        
}]);


