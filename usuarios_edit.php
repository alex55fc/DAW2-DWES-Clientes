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
      
    $sql="SELECT `id`, `username`, `pass`, `nombre`, `apellidos`, `email`, `created_at`, `update_at` FROM `usuarios` WHERE ".$_GET["id"];
      $query=$mysqli ->query($sql);
      if($query->num_rows>0){
        $fila=$query->fetch_assoc();
      }
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar usuario</h1>
      </div>
        
<!-- aqui lo redirigimos a usuario update-->
      <div class="col-12">
        <form action="usuarios_update.php" method="post" enctype="multipart/form-data">
          
        
          <!--boton para unviar al update-->
          <input type="hidden" name="id" value="<?php echo $fila["id"];?>">


          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $fila["username"];?>">
          </div>
          <div class="mb-3">
            <label for="pass" class="form-label">Pass</label>
            <input type="text" class="form-control" id="pass" name="pass" placeholder="pass" value="<?php echo $fila["pass"];?>">
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="<?php echo $fila["nombre"];?>">
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos" value="<?php echo $fila["apellidos"];?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $fila["email"];?>">
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