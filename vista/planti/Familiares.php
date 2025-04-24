<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Familiares</title>
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
                    <h1 style="text-align: center;">Familiares Cargados </h1>
                </div>                
            </div>            
            <div>
                <button  onclick="generarPDF_Huesped({_PDF_});" style="background-color: #478ba2; text-transform: uppercase;color: #fff;">Generar PDF</button>
            </div>

            <br>
            <div class="row tm-row">
                <div class="col-12" style="margin-top: 20px;">
                    
                    <table id="familia" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>apellidos</th>
                                <th>cedula</th>
                                <th>edad</th>
                                <th>titular</th>
                                <th>departamento</th>
                                <th>modificar</th>
                                <th>eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            {_TABLA_}
                        </tbody>
                        
                    </table>
                    
                </div>
            
                <br><br>
                <div class="col-12">
                    <div class="col-12">
                        <h1 style="text-align: center;">Vehiculo cargado</h1>
                    </div> 
                    <table id="cargaHM" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Color</th>
                                <th style="{_STYLE_COLUMNA_}">modificar</th>
                                <th style="{_STYLE_COLUMNA_}">eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            {_TABLA2_}
                        </tbody> 
                    </table>
                </div> 

                <br><br>

                <div class="col-12">
                
                    <div class="col-12">
                        <h1 style="text-align: center;">Trabajadores cargados</h1>
                    </div> 
                    <table id="cargatr" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>apellidos</th>
                                <th>cedula</th>
                                <th>edad</th>
                                <th>Fecha Entrada</th>
                                <th>Fecha Salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            {_TABLA4_}
                        </tbody> 
                    </table>
                         
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
            $('#familia').DataTable({
            } );
        } );

        function generarPDF_Huesped(id){
            var ancho= 1000;
            var alto = 800;
            //calcular posicion y centrar la ventana
            var x= parseInt((window.screen.width/2) - (ancho / 2));
            var y= parseInt((window.screen.height/2) - (alto / 2));

            $url= '../recursos/reportes/generaReporteHuesped.php?id='+id;
            window.open($url,"Reporte","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
        }

    </script>
</body>
</html>