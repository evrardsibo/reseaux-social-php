<?php
// voir tout les drivers

//var_dump(PDO::getAvailableDrivers());
//TESTER L’EXTENSION PDO

//if (extension_loaded('PDO')) {
//    echo 'PDO OK';
//} else {
//    echo 'PDO KO';
//}

$dsn = 'mysql:host=localhost;dbname=VIEWS;port=3306;charset=utf8';

try
{
    $bd= new PDO($dsn,'root','');
}catch (PDOException $e)
{
    die('impossible de se connecter a la bdd');
}


