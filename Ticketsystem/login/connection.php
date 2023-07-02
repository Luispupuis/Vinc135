<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "1234";
$dbname = "login";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
