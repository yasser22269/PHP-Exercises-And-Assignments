<?php
try {
$databaseHost = '127.0.0.1:3307';
$databaseName = 'register_login_php_task';
$databaseUsername = 'root';
$databasePassword = '';

//$mysql = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$con = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);

    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch (PDOException $e) {

    echo "Error : " . $e->getMessage() . "<br/>";

    die();

}

?>
