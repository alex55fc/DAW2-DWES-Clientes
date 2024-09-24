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
        <h1 class="h2">Alta usuarios</h1>

      </div>
      <div class="col-12">
          <!-- Redirige al php que hara el insert en la DB-->
        <form action="usuarios_insert.php" method="post" enctype="multipart/form-data">
      
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="username">
        </div>
        <div class="mb-3">
          <label for="pass" class="form-label">Pass</label>
          <input type="text" class="form-control" id="pass" name="pass" placeholder="pass">
        </div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
        </div>                        
        <div class="mb-3">
          <label for="apellidos" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="email">
        </div>
            
        <div class="mb3">
          <input type="submit" class="form-control" value="Aceptar">
        </div>
      </form> 
    </div>

    </main>

</div>

</html>
