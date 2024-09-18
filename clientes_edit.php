<!doctype html>
<html lang="en" data-bs-theme="auto">
  
  <?php include("head.php");?>
  <body>
    <?php include("iconos.php");?>

<?php include("header.php");?>



<div class="container-fluid">
  <div class="row">
    <?php include("menu.php");?>

<!-- aqui recuperamos la informacion del cliente por Id que seleccionamos antes para editarlo-->
    <?php
    include("db.php");
    $sql="SELECT `id`, `nombre`, `apellidos`, `created_at`, `update_at` FROM `clientes` WHERE `id`=".$_GET["id"];
      $query=$mysqli ->query($sql);
      if($query->num_rows>0){
        $fila=$query->fetch_assoc();
      }
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar cliente</h1>

      </div>
      <div class="col-4">
    <!-- aqui lo redirigimos a clientes_update-->
        <form action="clientes_update.php" method="post" enctype="multipart/form-data">
      </div>
      
      <!--boton para unviar al update-->
      <input type="hidden" name="id" value="<?php echo $fila["id"];?>">

      
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="<?php echo $fila["nombre"];?>">
      </div>
      <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos" value="<?php echo $fila["apellidos"];?>">
      </div>
      <div class="mb3">
        <input type="submit" class="form-control" value="Aceptar">
      </div>


    </main>

  </div>
</div>

</html>
