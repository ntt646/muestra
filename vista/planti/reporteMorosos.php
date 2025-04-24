
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Morosos</title>
    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ --><!-- https://fonts.google.com/ -->
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
                    <h1 style="text-align: center;">Reporte de Morosos</h1>
                </div>                
            </div>            
            <div class="row tm-row">
                <div class="col-12" style="margin-top: 20px;">
                    <center>
                        <table id="morosos" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                            <thead>
                                <tr>
                                    <th>torre</th>
                                    <th>numero</th>
                                    <th>propietario</th>
                                    <th>estatus</th>
                                    <th>activar/desactivar</th>
                                </tr>
                            </thead>
                            
                           <tbody>
                               {_TABLA_}
                           </tbody>
                        </table>
                    </center>
                </div>
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
            $('#morosos').DataTable({
            } );
        } );

    </script>
</body>
</html>