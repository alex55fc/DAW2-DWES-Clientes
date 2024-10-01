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
            <h1 class="h2">Alta direccion del proveedor</h1>

          </div>
          <div class="col-12">
            <form action="direcciones_proveedores_insert.php" method="post" enctype="multipart/form-data">

            <!--Select para escoger el proveedor-->
            <div class="mb-3">
              <label for="id_proveedor" class="form-label">Proveedor</label>
              <select class="form-control" id="id_proveedor" name="id_proveedor">
                <option></option>
                <?php 
                    include("db.php");
                    $sql="SELECT `id`, `razon_social`, `nombre_comercial`, `cif`, `formapago`, `created_at`, `updated_at` 
                    FROM `proveedores`WHERE 1";
                    
                    $query=$mysqli->query($sql);
                    if($query->num_rows>0){
                        while($fila=$query->fetch_assoc()){
                    
                ?>
                
                <option value="<?php echo $fila["id"]; ?>" > 
                    <?php echo $fila["razon_social"]; ?>-<?php echo $fila["cif"]; ?> 
                </option>
                
                <?php 
                        }
                }
                ?>
                </select>
            </div>
                
                
            <div class="mb-3">
              <label for="direccion" class="form-label">Direccion</label>
              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion comercial">
            </div>
            <div class="mb-3">
              <label for="localidad" class="form-label">Localidad</label>
              <input type="text" class="form-control" id="localidad" name="localidad" placeholder="localidad">
            </div>
            <div class="mb-3">
              <label for="provincia" class="form-label">Provincia</label>
              <input type="text" class="form-control" id="provincia" name="provincia" placeholder="provincia">
            </div>
            <div class="mb-3">
              <label for="cp" class="form-label">CP</label>
              <input type="text" class="form-control" id="cp" name="cp" placeholder="codigo postal">
            </div>
            <div class="mb-3">
              <input type="submit" class="form-control" value="Aceptar">
            </div>

            </form>
          </div>
        </main>

      </div>
    </div>
   </body>
</html>
