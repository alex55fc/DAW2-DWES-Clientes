<?php 

$id=$_POST["id"];
$razon_social=$_POST["razon_social"];
$nombre_comercial=$_POST["nombre_comercial"];
$cif=$_POST["cif"];
$formapago=$_POST["formapago"];


include("db.php");
//seguir desde aqui 
$sql="UPDATE `proveedores` SET `razon_social`='".$razon_social."',`nombre_comercial`='".$nombre_comercial."',`cif`='".$cif."',`formapago`='".$formapago."',`updated_at`='".date("Y-m-d h:i:s")."' WHERE `id` = '".$id."'";

$mysqli->query($sql);
header("location:proveedores.php");
?>
