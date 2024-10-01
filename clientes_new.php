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
        <h1 class="h2">Alta cliente</h1>
        </div>
      <div class="col-12">
        <form action="clientes_insert.php" method="post" enctype="multipart/form-data" id="formValidar">
      
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <span id="nombre_error" class="text-danger"></span>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
        </div>
        <div class="mb-3">
          <label for="apellidos" class="form-label">Apellidos</label>
          <span id="apellidos_error" class="text-danger"></span>
          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos">
        </div>
        <div class="mb3">
          <button  class="btn btn-primary w-100 py-2" type="button" id="btnValidar">Sign in</button>
        </div>

        </form>
      </div>
    </main>

  </div>
</div>
      
<!-- Esta parte para la validacion de los campos, que no sean nulos ni en blanco-->
<style>
    .borderError{
        border: 1px solid #ff0000;
    }
</style>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js" ></script>
      <script>
      $( document ).ready(function() {
          // para probar si funcionaba el SeetAlert-> Swal.fire("SweetAlert2 is working!");

        //------------------------------------------------------------------------------------------------------------
        /**
         * Displays a SweetAlert2 modal notifying the user that data has been inserted successfully.
         * The modal shows a progress bar and automatically closes after 2 seconds.
         * If the modal is closed due to the timer, the user is redirected to the "clientes.php" page.
         *
         * The method utilizes `Swal.fire` to create the alert and manages the modal's behavior during and after its display.
         *
         * @param {boolean} success - Indicates whether the data insertion was successful. 
         *        If true, a success modal is shown and the user is redirected upon closing the modal.
         *        If false, an error modal is displayed.
         *
         * @return {void} This method does not return a value but triggers a page redirection if the modal closes by timer.
         *
         * Example usage:
         * ```javascript
         * if (dataInserted) {
         *    showInsertAlert(true);
         * } else {
         *    showInsertAlert(false);
         * }
         * ```
         */      
          $("#btnValidar").click(function (){
                       let nombre=$("#nombre").val();
                       let apellidos=$("#apellidos").val();
                       let error= 0;
                    if(nombre == ""){
                            error=1;
                            $("#nombre_error").html("Debe introducir un nombre al cliente");
                            $("#nombre").addClass("borderError");

                        }
                    if(apellidos== ""){
                        error=1;
                        $("#apellidos_error").html("Debe introducir un apellido");
                        $("#apellidos").addClass("borderError");
                    }
                    //en vez de hacer un refresco de pantalla decidimos usar un ajax en vez de un submit
                    if(error== 0){
                        //$("#formValidar").submit();
                        $.ajax({
                           data:{nombre:nombre,apellidos:apellidos},
                            method:"POST",
                            url: "clientes_insert.php",
                            success: function(result){
                                if(result > 1){
                                    //alert("Datos insertados correctamente!");
                                        let timerInterval;
                                        Swal.fire({
                                          title: "Datos insertados correctamente!",
                                          html: "",
                                          timer: 2000,
                                          timerProgressBar: true,
                                          didOpen: () => {
                                            Swal.showLoading();
                                            const timer = Swal.getPopup().querySelector("b");
                                            timerInterval = setInterval(() => {
                                              timer.textContent = `${Swal.getTimerLeft()}`;
                                            }, 100);
                                          },
                                          willClose: () => {
                                            clearInterval(timerInterval);
                                          }
                                        }).then((result) => {
                                          /* Read more about handling dismissals below */
                                          if (result.dismiss === Swal.DismissReason.timer) {
                                            location.href="clientes.php";
                                          }
                                        });
                                      //location.href="clientes.php";
                                }
                                else{
                                    Swal.fire("No Insertado correctamente!");
                                }
                            }
                        });

                    }
                            
                   });
          //------------------------------------------------------------------------------------------------------------------------
          });
      </script>
    
    </body>
</html>
