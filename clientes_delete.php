<?php 

$id=$_GET["id"];

include("db.php");
$sql="DELETE FROM `clientes` WHERE `id` ='".$id."'";

if($mysqli->query($sql))echo 1;
else echo 0;
//header("location:clientes.php");
?>
