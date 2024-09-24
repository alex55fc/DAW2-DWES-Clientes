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
        <h1 class="h2">Alta proveedor</h1>

      </div>
      <div class="col-12">
        <form action="proveedores_insert.php" method="post" enctype="multipart/form-data">
      
        <div class="mb-3">
          <label for="razon_social" class="form-label">Razon social</label>
          <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="razon social">
        </div>
        <div class="mb-3">
          <label for="nombre_comercial" class="form-label">Nombre comercial</label>
          <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial" placeholder="nombre comercial">
        </div>
        <div class="mb-3">
          <label for="cif" class="form-label">Cif</label>
          <input type="text" class="form-control" id="cif" name="cif" placeholder="cif">
        </div>
      <div class="mb-3">
          <label for="formapago" class="form-label">Forma de pago</label>
          <input type="text" class="form-control" id="formapago" name="formapago" placeholder="forma pago">
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
