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
     
    <!-- header -->
   <div class="container-fluid" style="margin-top: 5%;" id="global">
        
            <center>
                <div id="" class="col-12" style="display: ">
                    <h2>Cambio de Contraseña</h2>
                </div> 

                <br>
                 
              <!--    Search form -->
                <div class="col-12">
                    <form action="{_RUT_}" method="post">
                        <input type="hidden" name="id" value="{_ID_}">

                        <label>Escribe la contraseña</label>
                        <input type="password" name="pass1" autofocus="autofocus" min="6" max="10" placeholder="Escriba la contraseña" />

                        <br>

                        <label>Confirmar contraseña</label>
                        <input type="password" name="pass2" min="6" max="10" placeholder="Vuelva a escribir la contraseña" required />
                        <br>

                        <input type="submit" id="enviar" value="Modificar" style="display: none;" />
                    </form>
                </div>
            </center>
        
    </div>
    <script type="text/javascript" src="../recursos/js/js2/jquery.js"></script>
    <script src="../recursos/js/js2/templatemo-script.js"></script>
    <script type="text/javascript" src="../recursos/js/js2/datatable/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        

         $(document).ready(function() {
            //variables
            var pass1 = $('[name=pass1]');
            var pass2 = $('[name=pass2]');
            var confirmacion = "Las contraseñas si coinciden";
            var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
            var negacion = "No coinciden las contraseñas";
            var vacio = "La contraseña no puede estar vacía";
            //oculto por defecto el elemento span
            var span = $('<br><span></span>').insertAfter(pass2);
            span.hide();
            //función que comprueba las dos contraseñas
            function coincidePassword(){
                var valor1 = pass1.val();
                var valor2 = pass2.val();
                //muestro el span
                span.show().removeClass();
                //condiciones dentro de la función
                if(valor1 != valor2){
                    span.text(negacion).addClass('negacion');   
                }
                if(valor1.length==0 || valor1==""){
                    span.text(vacio).addClass('negacion');  
                }
                if(valor1.length<6 || valor1.length>10){
                    span.text(longitud).addClass('negacion');
                }
                if(valor1.length!=0 && valor1==valor2){
                    span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
                    document.getElementById("enviar").style.display="block";
                }
            }
            //ejecuto la función al soltar la tecla
            pass2.keyup(function(){
                coincidePassword();
            });
        });
    </script>

</body>
</html>