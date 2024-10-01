<!doctype html>
<html lang="en" data-bs-theme="auto">
  <!--Include para incorporar el contenido de otros achivos PHP-->
    <?php include("head.php");?>
    <?php include("iconos.php");?>
    <?php include("header.php");?>
    
      
<div class="container-fluid">
  <div class="row">
    <?php include("menu.php");?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Direcciones proveedores</h1>
        <a href="direcciones_proveedores_new.php" class="btn btn-primary">Nueva direccion del proveedor</a>
      </div>  
        
        <!--Conexion a la DB-->
      <?php include("db.php");?>

      <table class="table">
      <tr>
        <th>Id</th>
        <th>Razon social</th>
        <th>Direccion</th>
        <th>Localidad</th>
        <th>Provincia</th>
        <th>CP</th>
        <th>Acciones</th>
      </tr>
      
      <?php 
          $sql="SELECT `direcciones_proveedores`.`id`, `direcciones_proveedores`.`id_proveedor`,
          `direcciones_proveedores`.`direccion`,  `direcciones_proveedores`.`localidad`,
          `direcciones_proveedores`.`provincia`, `direcciones_proveedores`.`cp`,
          `direcciones_proveedores`.`created_at`, `direcciones_proveedores`.`updated_at`,
          `proveedores`.`razon_social` FROM `direcciones_proveedores` ";
          $sql.=" INNER JOIN `proveedores` ON `direcciones_proveedores`. `id_proveedor`= `proveedores`.`id`";       
          
          $query=$mysqli ->query($sql);

        if($query->num_rows>0){
          while($fila=$query->fetch_assoc()){
        ?>
            <tr>
              <td><?php echo $fila["id"];?></td>
              <td><?php echo $fila["razon_social"];?></td>
              <td><?php echo $fila["direccion"];?></td>
              <td><?php echo $fila["localidad"];?></td>
              <td><?php echo $fila["provincia"];?></td>
              <td><?php echo $fila["cp"];?></td>

            <!-- boton para editar cada una de las filas, mandara el valor que esta en la fila seleccionada por Id-->
              <td>
                  <a href="direcciones_proveedores_edit.php?id=<?php echo $fila["id"];?>"><i class="fa-solid fa-pen-to-square"></i></a> 
                  <a href="direcciones_proveedores_delete.php?id=<?php echo $fila["id"];?>"><i class="fa-solid fa-trash"></i></a>
              </td>  


            </tr>
        <?php
            }
        }
        ?>

      </table>



    </main>
  </div>
</div>

</html>
