<!doctype html>
<html lang="en" data-bs-theme="auto">
  <?php include("head.php");?>
  <body>
    <?php include("iconos.php");?>

<?php include("header.php");?>

<div class="container-fluid">
  <div class="row">
    <?php include("menu.php");?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Modificar dirección proveedor</h1>
      </div>
        
        
<?php
 include("db.php");
$sqlP="SELECT `id`, `id_proveedor`, `direccion`, `localidad`, `provincia`, `cp`, `created_at`, `updated_at` FROM `direcciones_proveedores` WHERE  `id`=".$_GET["id"];
    $queryP=$mysqli->query($sqlP);    
    if($queryP->num_rows>0){
        $filaP=$queryP->fetch_assoc();
    
    }
?>         
<div class="col-12">
     
    <form action="direcciones_proveedores_update.php" method="post" enctype="multipart/form-data">
        
<input type="hidden" name="id" value="<?php echo $filaP["id"];?>">


<div class="mb-3">
  <label for="id_proveedor" class="form-label">Proveedor</label>
  <select class="form-control" id="id_proveedor" name="id_proveedor">
  <option></option>
  <?php
      include("db.php");
    $sql="SELECT `id`, `razon_social`, `nombre_comercial`, `cif`, `formapago`, `created_at`, `updated_at` FROM `proveedores` WHERE 1";
   
    $query=$mysqli->query($sql);    
    if($query->num_rows>0){
        while($fila=$query->fetch_assoc()){
        $selected="";
        if( $fila["id"]== $filaP["id_proveedor"])$selected="selected";
        ?>
      <option value="<?php echo $fila["id"];?>"   <?php echo  $selected;?>      ><?php echo $fila["razon_social"];?>-<?php echo $fila["cif"];?></option>
    <?php }
    }
    ?>
 </select>
</div>
        
       
        
<div class="mb-3">
  <label for="direccion" class="form-label">Dirección</label>
  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="dirección" value="<?php echo $filaP["direccion"];?>">
</div>

    
<div class="mb-3">
  <label for="localidad" class="form-label">Localidad</label>
  <input type="text" class="form-control" id="localidad" name="localidad" placeholder="localidad" value="<?php echo $filaP["localidad"];?>">
</div>
        
      
   
<div class="mb-3">
  <label for="provincia" class="form-label">provincia</label>
  <input type="text" class="form-control" id="provincia" name="provincia" placeholder="provincia" value="<?php echo $filaP["provincia"];?>">
</div>

<div class="mb-3">
  <label for="cp" class="form-label">CP</label>
  <input type="text" class="form-control" id="cp" name="cp" placeholder="cp" value="<?php echo $filaP["cp"];?>">
</div>
        
<div class="mb-3"> 
  <input type="submit" class="form-control" value="Aceptar">
</div>
    
    </form>
 </div>       
      

      
    </main>
  </div>
</div>
 <?php include("scripts.php");?>     
</body>
</html>