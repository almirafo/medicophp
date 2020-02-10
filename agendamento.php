<!DOCTYPE html>

<!-- https://ciphertrick.com/2015/06/01/search-sort-and-pagination-ngrepeat-angularjs/ -->

<html ng-app="agendamentoApp">
<?php header('Access-Control-Allow-Origin: *'); ?>


<script type="text/javascript">
  var host = <?php echo "'".$_SERVER['HTTP_HOST'] ."'";?>

</script>

  <head>
        <meta charset="UTF-8"/>
        <title>Agendamento de Consultas</title>

         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-sanitize.js"></script>

 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="scripts/modal.js" type="text/javascript"></script>
        <script src="scripts/moment.min.js" type="text/javascript"></script>
        <script src="scripts/select.js" type="text/javascript"></script>
        <link href="css/select.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-route.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-cookies.min.js" type="text/javascript"></script>
        
 <script src="scripts/app/config.js" type="text/javascript"></script>
        <script src="scripts/app/agendamento.js" type="text/javascript"></script>
    </head>

    <body ng-controller="agendamentoCtrl">
        <div ng-include="'views/navbar.htm'"></div>
                
 
        <form id="agendarCosulta" >
              <div class="form-group row" >
                    <div class="col-sm-2  col-form-label col-form-label-sm"> Código : {{paciente.selected.numeroProntuario}}{{paciente.numeroProntuario}}  </div>
              </div>
              <div class="form-group row" >
                <label for="nome" class="col-sm-2 col-form-label col-form-label-sm">Pesquia Paciente</label>
                <div class="col-sm-3">
                    
                    <ui-select  ng-model="paciente.selected" name="paciente" theme="bootstrap" title="Selecione o Paciente"  >
                        <ui-select-match   placeholder="Selecione ou procure o paciente na lista ..." >{{$select.selected.nome}}</ui-select-match>
                        <ui-select-choices repeat="paciente in pacientes | filter: $select.search" refresh="buscar($select.search)" >
                          <span ng-bind-html="paciente.nome | highlight: $select.search"></span>
                          <small ng-bind-html="paciente.codigo_paciente | highlight: $select.search"></small>
                          <small ng-bind-html="paciente.numeroProntuario | highlight: $select.search"></small>
                        </ui-select-choices>
                    </ui-select>
                    
                </div>
                
                <div class="col-sm-1">
                     <button type="button" class="btn btn-primary" ng-click="getPaciente()">Carregar</button>
                </div>

                <div class="col-sm-2">
                     <button type="button" class="btn btn-warning" ng-click="setPaciente('novo')">Paciente Novo</button>
                </div>
                
                <div class="col-sm-1">
                     <a href='pacientevisualizar.html?codigo_paciente={{paciente.selected.codigo_paciente}}&action=buscar' class="btn btn-primary"  title="Visualizar Paciente">
                        Visualizar Paciente
                     </a>
                </div>                
                
                
              </div>
              <hr>
              
              <div class="form-group row">  
                   <label for="nomePaciente" class="col-sm-2 col-form-label col-form-label-sm">Paciente</label>
                   <div class="col-sm-4" >
                       <input id="nomePaciente" class="form-control form-control-sm" required ng-model="agendamento.nomePaciente"  placeholder="Nome do Paciente">
                   </div>
                   
                   <label class="col-sm-2 col-form-label col-form-label-sm">Ultima Consulta: {{agendamento.ultimaConsulta}}</label>
                   
                   
                   <label for="novo" class="col-sm-1 col-form-label col-form-label-sm">Novo</label>
                    <div class="col-sm-3">
                        <input type="checkbox" class="form-check-input col-form-label " ng-model="agendamento.novo" id="novo">
                    </div>
              </div>
              
              <div class="form-group row">  
                
                  
                  
                    <label for="FoneContato" class="col-sm-2 col-form-label col-form-label-sm">Contato</label>
                    <div class="col-sm-2">
                        <input type="phone" class="form-control form-control-sm" ng-model="paciente.selected.fone_res"  ng-value="paciente.selected.fone_res" id="FoneContato" maxlength="11" size="11" >
                    </div>

                    <label for="example-date-input" class="col-sm-2 col-form-label" >Data Agendada</label>
                    
                    
                    <div class="col-sm-2">
                        <span class="label label-default">{{agendamento.data}}</span>
                    </div>
                 
                    
                    <div class="col-sm-2">
                       <select class="form-control form-control-sm" ng-model="agendamento.CodigoMedico" ng-value="agendamento.CodigoMedico"
                        ng-options="medico.Codigo as medico.Nome for medico in medicos"></select> 
                    </div>
                    
                    
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" ng-click="listaAgenda()">Consulta Agenda</button>
                    </div>
                    
                    
              </div>   

            <div class="form-group row"> 
                <div class="col-sm-2">
                <label  class="col-sm-2 col-form-label-sm ">Convênio</label>
                </div>
                <div class="col-sm-2">
                    
                    <select class="form-control form-control-sm" ng-model="paciente.selected.cod_convenio" ng-value="paciente.selected.cod_convenio"
                        ng-options="convenio.cod_convenio as convenio.name for convenio in convenios"></select>    
                
               </div>
                <div class="col-sm-2">    
                    <button class="btn btn-primary" data-toggle="modal" data-target="#PlanosModal" ng-click="getPlano(paciente.selected.cod_convenio)" >Rede Crendenciada</button>
                    
                    <label class="label label-default" >{{agendamento.NomePlano}}</label>
                </div>
                
                
                
                <div class="col-sm-1">
                <label  class="col-sm-2 col-form-label-sm ">Carteira</label>
                </div>
                <div class="col-sm-2">
                <input class="form-control form-control-sm" ng-model="paciente.selected.numeroCartao">
                </div>
                <div class="col-sm-1">
                <label  class="col-sm-2 col-form-label-sm ">Sexo</label>
                </div>
                

                <div class="col-sm-2">
                    <select class="form-control form-control-sm" ng-model="paciente.selected.sexo" ng-value="paciente.selected.sexo"
                        ng-options="sexo.cod_sexo as sexo.name for sexo in sexos.availableOptions"></select>    
               </div>
                    
                
               
            </div>            
            
            <div class="form-group row">
                   <label for="retorno" class="col-sm-2 col-form-label col-form-label-sm">Retorno</label>
                    <div class="col-sm-3">
                        <input type="checkbox" class="form-check-input col-form-label " ng-model="agendamento.retorno" id="retorno">
                    </div>

                   <label for="reagendamento" class="col-sm-1 col-form-label col-form-label-sm">Reagendamento</label>
                    <div class="col-sm-2">
                        <input type="checkbox" class="form-check-input col-form-label " ng-model="agendamento.reagendamento" id="reagendamento">
                    </div>


            </div>  
            
              <div class="form-group row">
                  <label for="statusAgendamento" class="col-sm-2 col-form-label col-form-label-sm">Status</label>
                   
                    <div class="col-sm-2">
                        <select class="form-control form-control-sm" ng-model="agendamento.statusAgenda" ng-value="agendamento.statusAgenda"
                        ng-options="statusAgenda.StatusAgendamento as statusAgenda.StatusAgendamento for statusAgenda in statusAgenda.availableOptions"></select>    
                    </div>    
              </div> 
             <div class="form-group row"> 
             <label for="exampleTextarea" class="col-sm-2 col-form-label-sm ">Observação</label>
             <div class="col-sm-10">
                 <textarea class="form-control" ng-model="agendamento.observacao" ng-value="agendamento.observacao" id="observacao" rows="3"></textarea>
             </div>
            </div>
                
                
                
                <div class="form-group row">
                <div class="col-sm-1">
                    <button type="button" class="btn btn-primary" ng-click="salvar()">Salvar</button>
                </div>
                <div class="col-sm-9">        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#GeraconsultaModal"  ng-click="">Gerar Consulta</button>
                </div>
                <div class="col-sm-2">    
                 <button class="btn btn-default" ng-click="clear()">Limpar</button>
                </div>
                    
                    
                </div>
              
            </form>

        

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agenda - {{agendamento.CodigoMedico}}</h4>
      </div>
      <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-condensed" >
                    <thead>
                        <tr>
                          <th>Descrição</th>
                          <th>Data</th>
                          <th>Hora De</th>
                          <th>Hora Ate</th>
                          <th></th>
                        </tr>
                        
                        
                      </thead>
                    <tbody>
                        <tr ng-repeat="item1 in agenda">
                          <td>{{item1.descricao}}</td>
                          <td>{{item1.dia}}</td>
                          <td>{{item1.horade}}</td>
                          <td>{{item1.horaAte}}</td>
                          <td>
                              <button type="button" class="btn btn-default btn-sm" title="apagar"  ng-click="delete(item1)">
                                <span class="glyphicon glyphicon-trash"></span> 
                              </button>
                          </td>    
                        </tr>
                    </tbody>
                      
                      
              </table>
            </div>
        
        <input type="date" ng-model="agenda.dia">
        <input type="time" ng-model="agenda.hora">
        
        <label class="radio-inline">
          <input type="radio" name="optradio">15
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio">30
        </label>
        <label class="radio-inline">
          <input type="radio" name="optradio">60
        </label>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal" ng-click="reservar()">Reservar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>







<!-- Modal Planos-->
<div id="PlanosModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rede Credenciada</h4>
      </div>
      <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-condensed" >
                    <thead>
                        <tr>
                          <th>Rede</th>
                        </tr>
                        
                        
                      </thead>
                    <tbody>
                        <tr ng-repeat="item1 in planos">
                            <td><a href="#" data-dismiss="modal" ng-click="escolherPlano(item1)">{{item1.NomePlano}}</a> </td>
                        </tr>
                    </tbody>
                      
                      
              </table>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>





<!-- Modal Planos-->
<div id="GeraconsultaModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gera Consulta</h4>
      </div>
      <div class="modal-body">
            <div class="table-responsive">
                
                <form ng-submit="inserirConsulta()">
                    
                    <p>{{paciente.selected.nome}}<p>
                    <p>{{paciente.selected.numeroProntuario}}</p>
                    
                    <div class="form-group row">
                        <div class="col-sm-4">
                        <input type="date" class="form-control" ng-model="consulta.DataAtendimento" ng-value="agendamento.data"/>
                        </div>
                        <div class="col-sm-4">
                        <input type="time" class="form-control" ng-model="consulta.horaAtendimento" ng-value="agendamento.data"/>
                        </div>
                    </div>
                    <p>Guia <input type="text" ng-model="agendamento.numeroGuia"></p>
                    
                    <div class="form-group row"> 
                    <label for="exampleTextarea" class="col-sm-2 col-form-label-sm ">Observação</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" ng-model="consulta.observacao" ng-value="consulta.observacao" id="observacao" rows="3"></textarea>
                    </div>
                    </div>
                    
                     <div class="form-group row"> 
                        
                        <div class="col-sm-10">
                            <input class="form-control" type="file"  multiple name="file">
                        </div>
                    </div>
                    
                   
                    
                    
                </form>
            </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" ng-click="gerarConsulta()" data-dismiss="modal">Salvar</button>  
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>







        
        
        
    </body>
</html>