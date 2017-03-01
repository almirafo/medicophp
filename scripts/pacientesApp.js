/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function() {
    $('#pacientesTable').DataTable();
} );

var app = angular.module("pacientesApp",[]);


app.service('filteredListService', function () {
    this.searched = function (valLists, toSearch) {
        return _.filter(valLists,
        function (i) {
            /* Search Text in all 3 fields */
            return searchUtil(i, toSearch);
        });
    };

    this.paged = function (valLists, pageSize) {
        retVal = [];
        for (var i = 0; i < valLists.length; i++) {
            if (i % pageSize === 0) {
                retVal[Math.floor(i / pageSize)] = [valLists[i]];
            } else {
                retVal[Math.floor(i / pageSize)].push(valLists[i]);
            }
        }
        return retVal;
    };
});


app.controller('listar',function ($scope, $http, $filter, filteredListService){
    $scope.pacientes =[];
    $scope.pageSize = 40;

    $http.get("http://localhost:90/medico/testeAccess.php?pageSize=40").then(
            function(response){
                $scope.pacientes = response.data;
            }) ;
    
    $scope.pagination = function () {
        $scope.ItemsByPage = filteredListService.paged($scope.filteredList, $scope.pageSize);
    };

  $scope.setPage = function () {
        $scope.currentPage = this.n;
    };

 $scope.firstPage = function () {
        $scope.currentPage = 0;
    };

$scope.lastPage = function () {
     $scope.currentPage = $scope.ItemsByPage.length - 1;
};


$scope.range = function (input, total) {
        var ret = [];
        if (!total) {
            total = input;
            input = 0;
        }
        for (var i = input; i < total; i++) {
            if (i != 0 && i != total - 1) {
                ret.push(i);
            }
        }
        return ret;
    };

 





});

function searchUtil(item, toSearch) {
    /* Search Text in all 3 fields */
    return (item.nome.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.numeroProntuario.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 == toSearch) ? true : false;
}

