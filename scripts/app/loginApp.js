/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var appLogin = angular.module('loginApp',[]);

appLogin.controller('loginController',['$scope', '$http', '$window', function ($scope, $http, $window){

    $scope.error="";
    
    $scope.logout = function( ){

        $http({
            url:"api/loginAPI.php?action=logout",
                   method:"get"
         })
        .success(function (response){
                    //$window.location.href ="index.php";
        });

    };
    
    $scope.logar = function( ){
        if ($scope.user==="" || $scope.pwd===""){
            return;
        }
        $http({
                    url:"api/loginAPI.php?action=logar",
                    params:{user         : $scope.user,
                            password     : $scope.pwd
                           },
                           method:"post"
                 })
        .success(function (response){
                $scope.logged =  response;   
                if ($scope.logged) {
                    $window.location.href ="pacientes.php";
                } else {
                    $window.location.href ="index.php";
                }

                });

    };


    $scope.telaregistre = function( ){
         $window.location.href ="registre.php";
    }

    $scope.registre = function( ){
        if ($scope.user==="" || $scope.pwd===""){
                    return;
                };

        
        $http({
                    url:"api/loginAPI.php?action=verify",
                    params:{username  : $scope.username
                           },
                           method:"get"
         }).success(function (response){
           
           if (response){
               alert("usuário já cadastrado");
               return;
           }
         });

                
        $http({
                    url:"api/loginAPI.php?action=registre",
                    params:{username  : $scope.username,
                            password  : $scope.password,
                            email     : $scope.email,
                            phone     : $scope.phone
                           },
                           method:"get"
         })
        .then(function (response){
                if (response.data==="1") {

                    $window.location.href ="index.php";
                }else{
                    alert("erro ao registrar"+response);
                }

          });        

    };

    
}]) ;


