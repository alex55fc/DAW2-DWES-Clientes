<?php 

$id=$_GET["id"];

include("db.php");
$sql="DELETE FROM `clientes` WHERE `id` ='".$id."'";

$mysqli->query($sql);
header("location:clientes.php");
?>
