<?php 

$id=$_POST["id"];
$username=$_POST["username"];
$pass=$_POST["pass"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$email=$_POST["email"];

include("db.php");
//seguir desde aqui 
$sql="UPDATE `usuarios` SET `username`='".$username."',`pass`='".$pass."',`nombre`='".$nombre."',`apellidos`='".$apellidos."',`email`='".$email."',`update_at`='".date("Y-m-d h:i:s")."' WHERE `id` = '".$id."'";

$mysqli->query($sql);
header("location:usuarios.php");
?>
