<?php 
//para comprobar como legan los datos del post antes de continuar 
//var_dump($_POST);

$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
include("db.php");
$sql="INSERT INTO `clientes`(`id`, `nombre`, `apellidos`, `created_at`, `update_at`) VALUES (";

$sql.="'NULL'";
$sql.=",'".$nombre."'";
$sql.=",'".$apellidos."'";
$sql.=",'".date("Y-m-d h:i:s")."'";
$sql.=",'".date("Y-m-d h:i:s")."'";
$sql.=")";

if($mysqli->query($sql)) echo $mysqli->insert_id;
else echo 0;
//esto lo comentamos ya que usamos el ajax header("location:clientes.php");
?>
