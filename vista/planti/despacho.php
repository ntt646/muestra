
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Acceso</title>
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
     
   <div class="container-fluid" id="global">
        <main class="tm-main">
          <!--    Search form -->
            <center>
                <div class="row tm-row" id="consulname" style="display: ">
                    <div class="col-12">
                        <h1 style="text-transform: uppercase;">Despacho</h1>
                    </div>                
                </div>            
                
                <div class="row tm-row">
                    <form action="../controlador/despachar.php" method="post">
                        
                    </form>
                </div>

                <div class="col-12">
                    <center>
                    <div class="row tm-row" id="datosHuesped" style="{_STYLE_}">
                       
                        <table id="fecha" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                            <thead>
                                <tr>
                                    <th>Departamento</th>
                                    <th>Fecha Entrada</th>
                                    <th>Fecha Salida</th>
                                    <th>Estado</th>
                                    <th>Despachar</th>
                                </tr>
                            </thead>
                            <tbody>
                                {_TABLA_}
                            </tbody>
                            
                        </table>
                    </div>
                    </center>
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
            $('#fecha').DataTable({
            } );


           
        } );

         function despachar(id){
            var depa= id
            var action ='salidaTotal'

            $.ajax({
                url: '../include/ajax.php',
                type: "POST",
                async: true,
                data:{action:action,depa:depa},

                success: function(response)
                {   
                    console.log(response);
                    if (response!='error') {

                        window.location.reload();
                    }else{
                        
                       Swal.fire('Error al Despacchar');

                    }
                    
                },

                error: function(error){


                }
            });
         }

    </script>
</body>
</html>