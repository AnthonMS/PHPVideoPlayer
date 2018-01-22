<?php
/**
 * Created by PhpStorm.
 * User: ASteiness
 * Date: 15-01-2018
 * Time: 13:08
 */


$serverName = "localhost";
$username = "root";
$password = "root";
$dbName = "streamingservice";
$connect = new mysqli($serverName, $username, $password, $dbName);
if ($connect->connect_error)
{
    die("Connection failed... " + $connect->connect_error);
}
//echo "Connection succesful";
?>