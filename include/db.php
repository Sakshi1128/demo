<?php
//MySQL connection
$dbServer ="localhost";
$dbUser ="root";
$dbPassword ="";
$database ="crudopretion";

$conn = mysqli_connect($dbServer,$dbUser,$dbPassword,$database) or die ('Mysql Connection Error:'. 
mysqli_connect_error());