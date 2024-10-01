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
        <h1 class="h2">Clientes</h1>
        <a href="clientes_new.php" class="btn btn-primary">Nuevo</a>
      </div>  
      <?php 
        include("db.php");
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
            ?>
            <!-- Importantisimo esto, crea un id con php 'fila' que contiene el id del cliente-->
            <tr id="fila<?php echo $fila["id"];?>">
              <td><?php echo $fila["id"];?></td>
              <td><?php echo $fila["nombre"];?></td>
              <td><?php echo $fila["apellidos"];?></td>
            <!-- boton para editar cada una de las filas, mandara el valor que esta en la fila seleccionada por Id-->
              <td>                  
                  <a href="clientes_edit.php?id=<?php echo $fila["id"];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                  <a href="#" id="btndelete<?php echo $fila["id"]; ?>"> <i class="fa-solid fa-trash"></i></a>
              </td>  

          </tr>
        <!-- ------------------------------------------------------------------------------------------------------------ -->
           <script>
            /**
             * Function that handles the click event on the delete button for a specific customer.
             * It uses SweetAlert2 to show a confirmation dialog and jQuery/AJAX to perform the 
             * deletion without reloading the page.
             *
             * @param {string} btnDeleteId - The dynamic id of the delete button for each customer row.
             * @param {string} customerId - The id of the customer to be deleted, dynamically generated in PHP.
             *
             * When the delete button is clicked, a confirmation alert is displayed with options to confirm or cancel the deletion.
             * If the user confirms:
             *    - An AJAX request is made to the "clientes_delete.php" file with the customer id to be deleted.
             *    - If the server successfully deletes the customer, a success alert is shown and the corresponding row is hidden with jQuery.
             *    - If the deletion fails, an error alert is shown.
             * If the user cancels:
             *    - No action is taken.
             *
             * @example
             * // Example usage of the code in a PHP environment
             * $("#btndelete123").click(function(){
             *    // Deletion logic
             * });
             */
            //Se refiere al boton dinamico de eliminar.
            $("#btndelete<?php echo $fila["id"];?>").click(function(){
               const swalWithBootstrapButtons = Swal.mixin({
                              customClass: {
                                confirmButton: "btn btn-success",
                                cancelButton: "btn btn-danger"
                              },
                              buttonsStyling: false
                            });
                            swalWithBootstrapButtons.fire({
                              title: "Desea eliminar al cliente?",
                              text: "no hay vuelta atrás!",
                              icon: "warning",
                              showCancelButton: true,
                              confirmButtonText: "Si, borrar!",
                              cancelButtonText: "No, mantener!",
                              reverseButtons: true
                            }).then((result) => {
                              //si es true ocurre esto:
                              if (result.isConfirmed) {
                                  $.ajax({
                                         data:{id:<?php echo $fila["id"];?>},
                                         method:"GET",
                                         url: "clientes_delete.php", 
                                         success: function(result){
                                             if(result==1){
                                                swalWithBootstrapButtons.fire({
                                                  title: "Eliminado!",
                                                  text: "Cliente dado de baja",
                                                  icon: "success"
                                                });
                                                /*esta linea oculta la fila con el id eliminado en DB, para que 
                                                parezca que se borra sin tener que refrescar la pagina, pero es solo una ilusion.
                                                Ya que el elemnto sige en la web solo que escondido y al refrescar la pagina ya no vuelve a aparecer
                                                el elemento puesto que ya no existe.
                                                **/
                                                 $("#fila<?php echo $fila["id"];?>").hide();
                                             }else{
                                                 swalWithBootstrapButtons.fire({
                                                  title: "No Eliminado!",
                                                  text: "Cliente NO dado de baja",
                                                  icon: "error"
                                                });
                                             }
                                        }
                                     });





                              } else if (
                                /* Read more about handling dismissals below */
                                result.dismiss === Swal.DismissReason.cancel
                              ) {
                              }
                            }); 
            });
        
            </script>
          <!-- ------------------------------------------------------------------------------------------------------------------------ -->
          
          
          
            <?php
            }
        }
      ?>

          </table>
        </main>
      </div>
    </div>
    </body>
</html>
