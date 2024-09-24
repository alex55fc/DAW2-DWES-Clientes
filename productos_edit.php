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
      
    $sql="SELECT `id`, `producto`, `imagen`, `precio`, `iva`, `stock`, `created_at`, `update_at` FROM `productos` WHERE id=".$_GET["id"];
      $query=$mysqli ->query($sql);
      if($query->num_rows>0){
        $fila=$query->fetch_assoc();
      }
      //var_dump($fila);
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar producto</h1>
      </div>
        
<!-- aqui lo redirigimos a usuario update-->
      <div class="col-12">
        <form action="productos_update.php" method="post" enctype="multipart/form-data">
          
        
          <!--boton para unviar al update-->
          <input type="hidden" name="id" value="<?php echo $fila["id"];?>">


          <div class="mb-3">
            <label for="producto" class="form-label">Producto</label>
            <input type="text" class="form-control" id="producto" name="producto" placeholder="producto" value="<?php echo $fila["producto"];?>">
          </div>
            
          <div class="mb-3">
          <label for="Imagen" class="form-label">Imagen</label>
              <br>
              <?php
              if($fila["imagen"]!=""){ ?>
              <img src="<?php echo $fila["imagen"];?>" class="img-fluid">    
              <?php } ?>   
           </div>
            <div class="mb-3">
              <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            
          <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" value="<?php echo $fila["precio"];?>">
          </div>
          <div class="mb-3">
            <label for="iva" class="form-label">Iva</label>
            <input type="number" class="form-control" id="iva" name="iva" placeholder="iva" value="<?php echo $fila["iva"];?>">
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="stock" value="<?php echo $fila["stock"];?>">
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
