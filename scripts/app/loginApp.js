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
                    url:"api/usuarioAPI.php?action=find",
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

<<<<<<< HEAD
    $scope.telaregistre = function( ){
         $window.location.href ="registre.php";
    }
=======

>>>>>>> e007be89df581f02b2cbd7981292e3bd6e3befa9
    $scope.registre = function( ){
        if ($scope.user==="" || $scope.pwd===""){
                    return;
                };
        $http({
                    url:"api/loginAPI.php?action=registre",
                    params:{user    : $scope.user,
                            pwd     : $scope.pwd
                           },
                           method:"post"
                 })
        .success(function (response){

<<<<<<< HEAD
                if (response==="true") {
                    $window.location.href ="index.php";
                }else{
                    alert("erro ao registrar"+response);
                }

                 })
        .error(function (error){

                    alert(error);
=======
                if ($scope.logged) {
                    $window.location.href ="pacientes.php";
                } else {
                    $window.location.href ="index.php";
                }

>>>>>>> e007be89df581f02b2cbd7981292e3bd6e3befa9
                 });        

    };

    
}]) ;


