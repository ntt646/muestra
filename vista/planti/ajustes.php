<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Contraseña</title>
    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../recursos/css/templatemo-xtra-blog.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../recursos/js/js2/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../recursos/css/style.css">


</head>
<body>
    <!-- header -->
      {_MENU_IZQ_}
    <!-- header -->
    
   <div class="container-fluid"  id="global">
        <main class="tm-main">
            <center>
                <div id="" class="col-12" style="display: ">
                    <h1>Cambio de Contraseña</h1>
                </div> 

                <br>
                 
              <!--    Search form -->
                <div class="col-12">
                    <form method="post" action="../controlador/modiContra.php">
                        <label>Usuario</label>
                        <input type="text" name="user" required>
                        <br><br>
                        <!--<label>Nueva Contraseña</label>
                        <input type="password" name="contra" id="contra">
                        <br>
                        <label>Confir. Contraseña</label>
                        <input type="password" name="conficontra" id="conficontra">
                        <br>-->
                        {_P_}
                        <button type="submit" id="button">Reestablecer</button>
                    </form>
                </div>
            </center>
        </main>
    </div>
    <script type="text/javascript" src="../recursos/js/js2/jquery.js"></script>
    <script src="../recursos/js/js2/templatemo-script.js"></script>
    <script type="text/javascript" src="../recursos/js/js2/datatable/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
         $(document).ready(function() {
            $('#conficontra').keyup(function(){
                var pass1 = $('#contra').val();
                var pass2 = $('#conficontra').val();

                if (pass2 != pass1) {
                    Swal.fire('La contraseña no coincide');
                    document.getElementById("button").style.display="none";

                }

                if (pass2 == pass1) {
                    document.getElementById("button").style.display="block";
                }
            });
         });
    </script>

</body>
</html>