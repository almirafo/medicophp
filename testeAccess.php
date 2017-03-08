
<?php


$db_username = 'Admin'; //username
$db_password = ''; //password

//path to database file
$database_path = "c:/Almir/verea_db.accdb";

//check file exist before we proceed
if (!file_exists($database_path)) {
    die("Access database file not found !");
}

//create a new PDO object
$database = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=$database_path; Uid=$db_username; Pwd=$db_password;charset=utf-8");
/*

SELECT *
FROM (
  SELECT Top 15 
  *
  FROM
  (
   SELECT TOP 900
 
   *
   FROM paciente
   ORDER BY nome
  ) AS sub1
  ORDER BY sub1.nome desc
 ) AS clients
ORDER BY nome;
*/
$sql = 'SELECT  codigo_paciente,nome,numeroProntuario FROM paciente';
    
$array = $database->query($sql)->fetchAll();
header("Content-type: application/json; charset=utf-8");

function toUtf8(&$v, $k) {
    $v = utf8_encode($v);
}
array_walk_recursive($array, 'toUtf8');

echo json_encode($array);

    
