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
        <h1 class="h2">Usuarios</h1>
        <a href="usuarios_new.php" class="btn btn-primary">Nuevo usuario</a>
      </div>  
        
        <!--Conexion a la DB-->
      <?php include("db.php");?>

      <table class="table">
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Pass</th>
        <th>Nombre</th>
        <th>Apeliidos</th>
        <th>Email</th>
        <th>Acciones</th>
      </tr>
      
      <?php 
        $sql="SELECT `id`, `username`, `pass`, `nombre`, `apellidos`, `email`, `created_at`, `update_at` FROM `usuarios` WHERE 1";
            //ejecuta la sencuencia sql usando el objeto $mysqli, que representa la conexion a la DB. La funcion $query() devuelve un objeto de resultado.
          $query=$mysqli ->query($sql);

        if($query->num_rows>0){
            
          while($fila=$query->fetch_assoc()){
            /* 
            este var_dump lo usaremos para comprobar que tipo de dato es la variable, no usar en produccion
            var_dump($fila);
            */
        ?>
          <!--Aqui usamos el objeto fila que tiene el valor de la posicion del array.-->
            <tr>
              <td><?php echo $fila["id"];?></td>
              <td><?php echo $fila["username"];?></td>
              <td><?php echo $fila["pass"];?></td>
              <td><?php echo $fila["nombre"];?></td>
              <td><?php echo $fila["apellidos"];?></td>
              <td><?php echo $fila["email"];?></td>
            <!-- boton para editar cada una de las filas, mandara el valor que esta en la fila seleccionada por Id-->
              <td><a href="usuarios_edit.php?id=<?php echo $fila["id"];?>">Editar</a></td>  
              <td><a href="usuarios_delete.php?id=<?php echo $fila["id"];?>"><i class="fa-solid fa-trash"></i></a></td>  


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
