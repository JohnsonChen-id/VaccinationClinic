<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "clientinfo";//table in mysql

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);


if(!$conn) {
	die("connection failed: ".mysqli_connect_error());
}