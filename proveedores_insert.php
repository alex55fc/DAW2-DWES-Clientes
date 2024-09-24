<?php 
//para comprobar como legan los datos del post antes de continuar 
//var_dump($_POST);
$razon_social=$_POST["razon_social"];
$nombre_comercial=$_POST["nombre_comercial"];
$cif=$_POST["cif"];
$formapago=$_POST["formapago"];

include("db.php");
$sql="INSERT INTO `proveedores`(`id`, `razon_social`, `nombre_comercial`, `cif`, `formapago`, `created_at`, `updated_at`) VALUES (";

$sql.="'NULL'";
$sql.=",'".$razon_social."'";
$sql.=",'".$nombre_comercial."'";
$sql.=",'".$cif."'";
$sql.=",'".$formapago."'";
$sql.=",'".date("Y-m-d h:i:s")."'";
$sql.=",'".date("Y-m-d h:i:s")."'";
$sql.=")";

$mysqli->query($sql);
header("location:proveedores.php");
?>
