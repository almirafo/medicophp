
<?php
require 'utils/coxexao.php';

$conexao =  new Conexao();
$database =$conexao->getdatabase(); 
$sql="";

if (!isset($_GET["nome"])){ 
$sql = 'SELECT Top 400 * FROM paciente order by nome';
}
else{
$nome = $_GET['nome'];
$sql = "SELECT Top 400 * FROM paciente where nome like '$nome%' order by nome";
};
/*$sql = "SELECT codigo_paciente,nome,numeroProntuario
		FROM (
		  SELECT Top {$pageSize} 
		  codigo_paciente,nome,numeroProntuario
		  FROM
		  (
		   SELECT TOP {$pageposition}
		 
		   codigo_paciente,nome,numeroProntuario
		   FROM paciente
		   ORDER BY nome
		  ) AS sub1
		  ORDER BY sub1.nome desc
		 ) AS clients
		ORDER BY nome";

*/
$array = $database->query($sql)->fetchAll();
header("Content-type: application/json; charset=utf-8");

function toUtf8(&$v, $k) {
    $v = utf8_encode($v);
}
array_walk_recursive($array, 'toUtf8');

echo json_encode($array);

    
