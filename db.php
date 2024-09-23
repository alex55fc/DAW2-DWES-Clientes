<?php
$host="localhost:3306";
$user="root";
$password="";
$database="ifc303";

//$mysqli es la variable que usaremos a lo largo de toda la web cuando llamamemos al conector de la DB
$mysqli= new mysqli($host, $user, $password, $database);

if(mysqli_connect_errno()){
    printf("Falló la conexion: %s\n", $mysqli-> connect_error);
    exit();
}
$mysqli->set_charset("utf8");


?>