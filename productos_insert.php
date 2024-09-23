<?php 
// Para comprobar cómo llegan los datos del POST antes de continuar var_dump($_POST);

$producto = $_POST["producto"];
$precio = $_POST["precio"];
$iva = $_POST["iva"];
$stock = $_POST["stock"];

include("db.php");

$sql = "INSERT INTO `productos`(`id`, `producto`, `imagen`, `precio`, `iva`, `stock`, `created_at`, `update_at`) VALUES (";

$sql .= "'NULL'"; // Asignar NULL al id si es autoincremental
$sql .= ",'" . $producto . "'";
$sql .= ",''";
$sql .= ",'" . $precio . "'";
$sql .= ",'" . $iva . "'";
$sql .= ",'" . $stock . "'";
$sql .= ",'" . date("Y-m-d h:i:s") . "'"; // Fecha de creación
$sql .= ",'" . date("Y-m-d h:i:s") . "'"; // Fecha de actualización
$sql .= ")";

$mysqli->query($sql);

$imagen=$_FILES["imagen"];

if($imagen["name"]!=""){
    //director de subida
    $target_dir="productos/";
    //extension del archivo que subo
    $imageTypeFile=strtolower(pathinfo($imagen["name"],PATHINFO_EXTENSION));
    //renombro el archivo
    $target_file=$target_dir."producto_".$mysqli->insert_id.".".$imageTypeFile;
    //subir el archivo y actualizar campo imagen en la tabla
    if(move_uploaded_file($imagen["tmp_name"],$target_file)){
        $sqlImg="UPDATE `productos` SET `imagen`='".$target_file."'";
        $sqlImg.=" WHERE `id`=".$mysqli->insert_id;
        $mysqli->query($sqlImg);
    }
}

header("location:productos.php");
?>
