<?php
   
$dsn = "mysql:host=localhost;dbname=universidad";
$user = "root";
$password = "";
$option = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");

$conn = new PDO($dsn, $user, $password, $option);

