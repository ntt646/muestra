<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada/Salida</title>
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
            <center>
                <div class="col-12">
                    <h1>Entrada/Salida Huesped</h1>
                </div>
                <div class="col-12" style="margin-top: 20px;" >
                    {_FORM_}
                </div>
               <div class="row tm-row" id="datosHuesped" style="{_STYLE_}">
                    <p>Desde: {_FECHAI_} Hasta: {_FECHAF_}</p>
                    <table id="familia" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>apellidos</th>
                                <th>departamento</th>
                                <th>torre</th>
                                <th>cod. brazalete</th>
                                <th>Hora Entrada</th>
                                <th>Hora salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            {_TABLA_}
                        </tbody>
                        
                    </table>
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
            $('#cargaHM').DataTable({
            } );

            $('#fechafi').keyup(function(e){
            
                if ($('#fechafi').val() < $('#fechaini').val()) {
                    //alert("La fecha final no puede ser menor a la fecha inicial");
                Swal.fire("Alerta", "la fecha final no puede ser menor a la fecha inicial");

                }

            });

             
        });

      

    </script>
</body>
</html>