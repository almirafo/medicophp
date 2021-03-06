<!DOCTYPE html>
<!-- https://ciphertrick.com/2015/06/01/search-sort-and-pagination-ngrepeat-angularjs/ -->

<html ng-app="consultaApp">

  <?php header('Access-Control-Allow-Origin: *'); ?>


  <script type="text/javascript">
    var host = <?php echo "'".$_SERVER['HTTP_HOST'] ."'";?>

  </script>
    <head>
        <meta charset="UTF-8"/>
     <title>Lista de Consultas</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.8/angular-route.min.js"></script>
         <script src="scripts/moment.min.js" type="text/javascript"></script>
        <script src="scripts/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="scripts/modal.js" type="text/javascript"></script>
        <script src="scripts/dirPagination.js" type="text/javascript"></script>
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <script src="scripts/app/consultaApp.js" type="text/javascript"></script>

        <style type="text/css">
          body .modal-faturamento {
                    width: 950px;
                    
                }

        </style>
    </head>

    <body  ng-controller="consultaCtrl"   style="align-items: center " >
        <div ng-include="'views/navbar.htm'"></div>
                
        <div style="width: 90%;  top:20px; left:130px" >
				
            <form class="form-inline">
                    <div class="form-group">
                        <label >Search</label>
                        <input type="text" ng-model="search" class="form-control" placeholder="Search">
                        <a href="agendamento.html" class="btn btn-info">Agendar Nova Consulta</a>
                    </div>
            </form>
            

               <table class="table table-striped table-hover">
                   <thead>
                       <tr >
                           <th>Data Consulta</th>
                           <th ng-click="sort('NomePaciente')">Nome
                           		<span class="glyphicon sort-icon" ng-show="sortKey=='nome'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span>
                           </th>
                           <th>numero Prontuario</th>
                           <th>Guia</th>
                           <th>Status</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr dir-paginate="item in consultas|orderBy:sortKey:reverse |filter:search|itemsPerPage:20">
                           <td>{{item.dataAtendimento}}</td>
                           <td>{{item.nome}}</td>
                           <td>{{item.numeroProntuario}}</td>
                           <td>{{item.GuiaConsulta}}</td>
                           <td ng-style="getColor(item.status)">{{item.status}}</td>
                           <td><a href='pacientevisualizar.html?codigo_paciente={{item.codigo_paciente}}&action=buscar' class="btn btn-primary" ><img ng-src="images/paciente.png" height="20" width="20"/>Visualizar Paciente</a></td>
                           <td><a href="consulta.html?codigo_consulta={{item.codigo_consulta}}&action=buscar&from=listaConsulta" class="btn btn-info"><img ng-src="images/medic-icon.png" height="20" width="20"/> Editar Consulta</a></td>
                           <td><button class="btn btn-primary"  data-toggle="modal" data-target="#FaturamentoModal" ng-click="cobranca(item)"> <img ng-src="images/cobranca.png" height="20" width="20"/> Cobrança</button></td>
                       </tr>
                   </tbody>
               </table>
               <dir-pagination-controls
                    max-size="20"
                    direction-links="true"
                    boundary-links="true" >
                </dir-pagination-controls>
         </div>
 


          <!-- Modal Faturamento-->
          <div id="FaturamentoModal" class="modal fade modal-faturamento" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Cobrança</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">


                      <div class="container-fluid">


                        <div class="form-group row" >
                          <div class="col-sm-6">Paciente:{{cobranca.nome}}</div>
                          
   
                        </div>

                        <div class="form-group row" >
                          <div class="col-sm-6  col-form-label col-form-label-sm">Prontuário: {{cobranca.numeroProntuario}} </div>
                        </div>


                        <div class="form-group row" >
                          <div class="col-sm-6  col-form-label col-form-label-sm">Atendimento: {{cobranca.dataAtendimento}} </div>
                        </div>



                        <div class="form-group row" >
                          <div class="col-sm-2  col-form-label col-form-label-sm">Guia: </div>
                          <div class="col-sm-6  col-form-label col-form-label-sm"> 
                          <input id="GuiaConsulta" class="form-control form-control-sm" required ng-model="cobranca.GuiaConsulta"  placeholder="Guia">
                          </div>
                        </div>



                        <div class="form-group row" >
                          <div class="col-sm-2  col-form-label col-form-label-sm">Status: </div>
                          <div class="col-sm-6  col-form-label col-form-label-sm"> 

                          <select class="form-control form-control-sm" ng-model="item.statusFaturamento" ng-value="item.status"
                                    ng-options="statusFaturamento.StatusFaturamento as statusFaturamento.StatusFaturamento for statusFaturamento in statusFaturamento.availableOptions"></select> 


                          </div>
                        </div>

                        <div class="form-group row" >
                          <div class="col-sm-2  col-form-label col-form-label-sm">Obs: </div>
                          <div class="col-sm-6  col-form-label col-form-label-sm"> 

                           <textarea class="form-control" rows="5" id="obs" placeholder="Observações" ng-model="cobranca.obs"></textarea>
                          
                          </div>
                        </div>

                        <div class="form-group row" >
                          <div class="col-sm-2  col-form-label col-form-label-sm">Pagamento: </div>
                          <div class="col-sm-6  col-form-label col-form-label-sm"> 

                           <input type="date"  class="form-control" ng-model="cobranca.dataPagamento">
                          </div>
                        </div>

                      </div>



                      </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="salvarCobranca(item)" >Salvar</button>
                </div>
              </div>

            </div>
          </div>








    </body>
</html>

