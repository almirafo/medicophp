/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


appLogin = angular.module('login.Services').service('SessionService', function(){
    var userIsAuthenticated = false;

    this.setUserAuthenticated = function(value){
        userIsAuthenticated = value;
    };

    this.getUserAuthenticated = function(){
        return userIsAuthenticated;
    };
    
    this.login = function(user,pwd){
        return true;
    };
});




window.routes =
{
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