<?php
require '../dao/Agenda.php'; 

//$action =  isset($_GET['action'])? $_GET['action'] :isset($_POST['action'])?$_POST['action']:"";
$agenda  = new Agenda();
$action = $_GET['action'];
if($action=="listar"){
    $cod_medico= 1;//$_GET['cod_medico'];
    echo $agenda->getAgendaByMedico($cod_medico);
};


if($action == 'alterarStatus'){
    $statusAgendamento      = isset($_GET['statusAgendamento'])      ?$_GET['statusAgendamento']     :"";
    $codigo_agenda          = isset($_GET['codigo_agenda'])      ?$_GET['codigo_agenda']     :0;
    
    
    $agendaDados = array(
		    "statusAgendamento"      => $statusAgendamento   ,
                    "codigo_agenda"           => $codigo_agenda        
        
    );
    $agenda->alterarAgendaStatus($agendaDados);
}

if($action=="inserir"){
    
                    $numeroProntuario      = isset($_GET['numeroProntuario'])      ?$_GET['numeroProntuario']     :"";
                    $FoneContato           = isset($_GET['FoneContato'])           ?$_GET['FoneContato']          :"";
                    $DataAgendada          = isset($_GET['DataAgendada'])          ?$_GET['DataAgendada']         :"";
                    $Horario               = isset($_GET['Horario'])               ?$_GET['Horario']              :"";
                    $Convenio              = isset($_GET['Convenio'])              ?$_GET['Convenio']             :"";
                    $Retorno               = isset($_GET['Retorno'])               ?$_GET['Retorno']              :"false";
                    $NovoPaciente          = isset($_GET['NovoPaciente'])          ?$_GET['NovoPaciente']         :"false";
                    $NomePaciente          = isset($_GET['NomePaciente'])          ?$_GET['NomePaciente']         :"";
                    $Reagendamento         = isset($_GET['Reagendamento'])         ?$_GET['Reagendamento']        :"false";     
                    $StatusAgendamento     = isset($_GET['StatusAgendamento'])     ?$_GET['StatusAgendamento']    :null;    
                    $codigo_convenio_plano = isset($_GET['codigo_convenio_plano']) ?$_GET['codigo_convenio_plano']:null;
                    $CodigoMedico          = isset($_GET['CodigoMedico'])          ?$_GET['CodigoMedico']         :0;
                    $codigo_paciente       = isset($_GET['codigo_paciente'])       ?$_GET['codigo_paciente']      :0;
                    $observacao            = isset($_GET['observacao'])            ?$_GET['observacao']           :"";
    
   $agendaDados = array(
		    "numeroProntuario"      => $numeroProntuario   ,
                    "FoneContato"           => $FoneContato        ,
                    "DataAgendada"          => $DataAgendada==""?null:$DataAgendada       ,
                    "Horario"               => $Horario            ,
                    "Convenio"              => $Convenio           ,
                    "Retorno"               => $Retorno            ,
                    "NovoPaciente"          => $NovoPaciente       ,
                    "NomePaciente"          => $NomePaciente       ,
                    "Reagendamento"         => $Reagendamento      ,
                    "codigo_convenio_plano" => $codigo_convenio_plano,
                    "codigo_paciente"       => $codigo_paciente,
                    "observacao"            => $observacao,
                    "CodigoMedico"          => $CodigoMedico      
					); 
   
   
   $agenda->insertAgenda($agendaDados); 
};

if($action=="alterar"){
    
};

if($action=="apagar"){
    
};

if($action=="buscar"){

    $consultaDados = array(
            "codigo_agenda"         => $_GET['codigo_agenda']     ,
            "codigo_paciente"       => $_GET['codigo_paciente']
            );
     
    echo $agenda->buscarPorCodigoAgenda($consultaDados);
    
}

if($action=="listarByPaciente"){
     $consultaDados = array(
            "codigo_paciente"       => $_GET['codigo_paciente']
            );
    echo $agenda->listarByPaciente($consultaDados);
}