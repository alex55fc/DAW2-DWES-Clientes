<!doctype html>
<html lang="en" data-bs-theme="auto">
  
    <?php include("head.php");?>
    <body>
    <?php include("iconos.php");?>
    <?php include("header.php");?>



<div class="container-fluid">
  <div class="row">
    <?php include("menu.php");?>

<!-- aqui recuperamos la informacion del cliente por Id que seleccionamos antes para editarlo,
recuperamos la informacion para poder mostrarla antes de hacer el edit sobre los campos.-->
    <?php
    include("db.php");
      
    $sql="SELECT `id`, `razon_social`, `nombre_comercial`, `cif`, `formapago`, `created_at`, `updated_at` FROM `proveedores` WHERE ".$_GET["id"];
      $query=$mysqli ->query($sql);
      if($query->num_rows>0){
        $fila=$query->fetch_assoc();
      }
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar proveedor</h1>
      </div>
        
<!-- aqui lo redirigimos a usuario update-->
      <div class="col-12">
        <form action="proveedores_update.php" method="post" enctype="multipart/form-data">
          
        
          <!--boton para unviar al update-->
          <input type="hidden" name="id" value="<?php echo $fila["id"];?>">


          <div class="mb-3">
            <label for="razon_social" class="form-label">Razon social</label>
            <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="razon_social" value="<?php echo $fila["razon_social"];?>">
          </div>
          <div class="mb-3">
            <label for="nombre_comercial" class="form-label">Nombre comercial</label>
            <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial" placeholder="nombre_comercial" value="<?php echo $fila["nombre_comercial"];?>">
          </div>
          <div class="mb-3">
            <label for="cif" class="form-label">CIF</label>
            <input type="text" class="form-control" id="cif" name="cif" placeholder="cif" value="<?php echo $fila["cif"];?>">
          </div>
          <div class="mb-3">
            <label for="formapago" class="form-label">Forma de pago</label>
            <input type="text" class="form-control" id="formapago" name="formapago" placeholder="formapago" value="<?php echo $fila["formapago"];?>">
          </div>


          <div class="mb3">
            <input type="submit" class="form-control" value="Aceptar">
          </div>
        </form>
    </div>

    </main>

</div>
        </div>
</html>
