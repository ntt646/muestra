<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Huespedes</title>
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
            <div class="row tm-row">
                <div class="col-12">
                    <h1 style="text-align: center;">Reporte de huespedes por hora</h1>
                </div>                
            </div>            
            <div class="row tm-row">
                <div class="col-12" style="margin-top: 20px;">
                    <center>
                        <table id="rphues" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Cedula</th>
                                    <th>Depa</th>
                                    <th>Brazalete</th>
                                    <th>Lugar</th>
                                    <th>Hora Entrada</th>
                                    <th>Hora Salida</th>
                                </tr>
                            </thead>
                            <tbody>
                                {_TABLA_}
                            </tbody> 
                        </table>
                    </center>
                </div>
            </div>

            <br><br>

            <div class="col-12" style="">
                <div class="col-12">
                    <h1 style="text-align: center;">Reporte de Vehiculo por hora</h1>
                </div> 
                <table id="cargaHM" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                    <thead>
                        <tr>
                            <th>Placa</th>
                            <th>Departamento</th>
                            <th>Lugar</th>
                            <th>Hora Entrada</th>
                            <th>Hora Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        {_TABLA2_}
                    </tbody> 
                </table>
            </div>
            <div class="row tm-row tm-mt-100 tm-mb-75">
                    
            </div>            
            
            
        </main>
    </div>
    <script type="text/javascript" src="../recursos/js/js2/jquery.js"></script>
    <script src="../recursos/js/js2/templatemo-script.js"></script>
    <script type="text/javascript" src="../recursos/js/js2/datatable/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#rphues').DataTable({
            } );
             $('#cargaHM').DataTable({
            } );
        } );

    </script>
</body>
</html>