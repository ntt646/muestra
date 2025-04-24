
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
            <div class="row tm-row">
                <div class="col-12">
                    <h1 style="text-transform: uppercase;">Listado de huspedes</h1>
                </div>               

                <div>
                    <label>filtro por fechas</label>
                    <br>
                    <label style="width: 130%;">DESDE:
                    <input type="date" name="fechaini" id="fechaini" style="width: 30%">
                    Hasta:
                    <input type="date" name="fechafi" id="fechafi" style="width: 30%">
                   
                    <button name="opfecham" id="opfecham" style="background-color: #0c14ad;color: #fff;">Generar PDF</button>
                    </label>
                
                </div>      
            </div>            
            <div class="row tm-row">
                <div class="col-12" style="margin-top: 20px;">
                    
                    <table id="huesped" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>apellidos</th>
                                <th>cedula</th>
                                <th>edad</th>
                                <th>titular</th>
                                <th>departamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            {_TABLA_}
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
            $('#huesped').DataTable({
            } );

            $('#opfecham').click(function(){

                var fi = $('#fechaini').val();
                var ff = $('#fechafi').val();

                if (fi > ff) {
                    alert("La fecha inicial no debe ser mayor a la fecha final");
                }else{
                    generarPDF_EstadiaM(fi,ff);
                }


             } );
            });

            function generarPDF_EstadiaM(fi,ff){
                var ancho= 1000;
                var alto = 800;
                //calcular posicion y centrar la ventana
                var x= parseInt((window.screen.width/2) - (ancho / 2));
                var y= parseInt((window.screen.height/2) - (alto / 2));

                $url= '../recursos/reportes/generaReporteEstadiaM.php?fi='+fi+'&ff='+ff;
                window.open($url,"Reporte","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
            }

         

    </script>
</body>
</html>