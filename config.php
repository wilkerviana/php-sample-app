<?php
/* Credenciais de comunicação com o banco. */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
// Remova a linha de comentário abaixo para testar a comunicação com o Banco:
/*

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Remova a linha de comentário abaixo para testar a comunicação com o Banco:
*/
?>
