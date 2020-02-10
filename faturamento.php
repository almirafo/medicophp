
<!DOCTYPE html>
<!-- https://ciphertrick.com/2015/06/01/search-sort-and-pagination-ngrepeat-angularjs/ -->

<?php header('Access-Control-Allow-Origin: *'); ?>


<script type="text/javascript">
  var host = <?php echo "'".$_SERVER['HTTP_HOST'] ."'";?>

</script>

<html ng-app="consultaApp">
    <head>
        <meta charset="UTF-8"/>
     <title>Lista de Consultas</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.8/angular-route.min.js"></script>
        
        <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
       
        <script src="scripts/dirPagination.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="scripts/app/config.js" type="text/javascript"></script>
        <script src="scripts/app/consultaApp.js" type="text/javascript"></script>
    </head>

    <body  ng-controller="consultaCtrl"   style="align-items: center " >
        <div ng-include="'views/navbar.htm'"></div>
 
         

          <div class="container-fluid">


            <div class="form-group row" >
              <div class="col-sm-3">Paciente:{{paciente.nome}}</div>
              <div class="col-sm-3  col-form-label col-form-label-sm">Cartão:   {{paciente.numeroCartao}}         </div>
              <div class="col-sm-3  col-form-label col-form-label-sm">Convenio: {{paciente.cod_convenio}}         </div>
              <div class="col-sm-3  col-form-label col-form-label-sm">Plano:    {{paciente.codigo_convenio_plano}}</div>
            </div>
          </div>

          <hr/>

            <div class="table-responsive" ng-controller="faturamentoController">
             <table class="table table-condensed" >
                    <thead>
                        <tr>
                          <th>Consulta</th>
                          <th>Guia</th>
                          <th>Pagamento</th>
                          <th>Status</th>
                          <th>OBS</th>
                          <th></th>
                        </tr>


                      </thead>
                    <tbody>
                        <tr ng-repeat="faturamento in faturamentos">
                          <td>{{faturamento.dataAtendimento}}</td>
                          <td><input type="text" name="numeroGuia" value="" placeholder="Guia"> </td>
                          <td>{{faturamento.dataPagamento}}</td>
                          <td>
                              <select class="form-control form-control-sm" ng-model="faturamento.status" ng-value="faturamento.status"
                              ng-options="faturamento.status as faturamento.status for faturamento in faturamento.availableOptions"></select>
                            </td>
                          <td><input type="text" name="OBS" value="" placeholder="OBSERVAÇÃO"> </td>
                          <td>  <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Apagar</button>
                         </td>
                        </tr>

                    </tbody>
              </table>
            </div>
       </div>




    </body>
</html>

