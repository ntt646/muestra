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
                    <h1 style="text-align: center;">Reporte de huespedes</h1>
                </div>                
            </div>            
            <div class="row tm-row">
                <div class="col-12" style="margin-top: 20px;">
                    <center>
                        <table id="rphues" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>apellidos</th>
                                    <th>Cedula</th>
                                    <th>departamento</th>
                                    <th>torre</th>
                                    <th>cod. brazalete</th>
                                    <th>ubicación</th>
                                    <th>Hora</th>
                                    
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
                    <h1 style="text-align: center;">Reporte de Vehiculo</h1>
                </div> 
                <table id="cargaHM" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                    <thead>
                        <tr>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Lugar</th>
                            <th>Depa</th>
                            <th>Hora</th>
                            <th>Obser.</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        {_TABLA2_}
                    </tbody> 
                </table>
            </div>

            <br><br>
            <div class="col-12" style="">
                
                <div class="col-12">
                    <h1 style="text-align: center;">Trabajadores</h1>
                </div> 
                <table id="cargatr" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>apellidos</th>
                            <th>cedula</th>
                            <th>Departamento</th>
                            <th>Ubicación</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        {_TABLA4_}
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
            $('#cargatr').DataTable({
            } );
        } );

    </script>
</body>
</html>