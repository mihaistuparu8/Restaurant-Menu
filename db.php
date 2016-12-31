<?php 

$dsn = "mysql:dbname=sac;host=localhost;port=3306";
$dsn_username = 'root';
$dsn_password = 'parola';

try {
    $db = new PDO($dsn, $dsn_username, $dsn_password); 
    //echo '<p style="color:#fff;background-color:#79ff4d;max-width:200px;opacity: 0.8">* Conectare reusita la db!<p>';
} catch(PDOException $e) {
    //die('Nu se poate face legatura cu baza de date!:<br/>' . $e);
    echo '<p style="color:#fff;background-color:red;max-width:200px;opacity: 0.8">* Nu se poate conecta la db!<p>';
}



?>

