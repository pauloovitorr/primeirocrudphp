<?php 

$host = 'localhost';
$db = 'smartregistry';
$usuario = 'root';
$senha = '';


$conecte = new mysqli($host,$usuario,$senha,$db);

//if($conecte->connect_error)
// {
//     echo "Deu ruim: " . $conecte->connect_errno;
// }
// else
// {
//     echo 'Deu bom';
// }

?>
