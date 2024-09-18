<!doctype html>
<html lang="en" data-bs-theme="auto">
  
  <?php include("../head.php");?>
  <body>
    <?php include("../iconos.php");?>

<?php include("../header.php");?>



<div class="container-fluid">
  <div class="row">
    <?php include("../menu.php");?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
        <a href="clientes_new.php" class="btn btn-primary">Nuevo</a>
      </div>  
      <?php 
        include("../db.php");
      ?>

      <table class="table">
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apeliidos</th>
        <th>Acciones</th>
      </tr>
      
      <?php 
        $sql="SELECT `id`, `nombre`, `apellidos`, `created_at`, `update_at` FROM `clientes` WHERE 1";
        $query=$mysqli ->query($sql);

        if($query->num_rows>0){
          while($fila=$query->fetch_assoc()){
            /* este var_dump lo usaremos para comprobar que tipo de dato es la variable, no usar en produccion
            var_dump($fila);
            */
            ?>
            <tr>
              <td><?php echo $fila["id"];?></td>
              <td><?php echo $fila["nombre"];?></td>
              <td><?php echo $fila["apellidos"];?></td>
            <!-- boton para editar cada una de las filas, mandara el valor que esta en la fila seleccionada por Id-->
              <td><a href="clientes_edit.php?id=<?php echo $fila["id"];?>">Editar</a></td>  
              <td><a href="clientes_delete.php?id=<?php echo $fila["id"];?>"><i class="fa-solid fa-trash"></i></a></td>  

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
