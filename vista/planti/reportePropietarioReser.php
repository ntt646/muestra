<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Propietarios</title>
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
                    <h1 style="text-align: center;">Reporte de departamentos</h1>
                </div>                
            </div>            
            <br>
            <div>
                <label>Filtro por fechas</label>
                <br>
                <label style="    width: 130%;">DESDE:
                <input type="date" name="fechaini" id="fechaini" style="width: 30%">
                Hasta:
                <input type="date" name="fechafi" id="fechafi" style="width: 30%">
               
                <button name="opfecha" id="opfecha" style="background-color: #0c14ad;color: #fff;">Generar PDF</button>
                </label>
                
            </div>
            <br>
            {_RE_}
            <div class="row tm-row">
                <div class="col-12" style="margin-top: 20px;">
                    <center>
                        <table id="reserva" class="table table-striped table-bordered" style="text-transform: ; text-align: center;" border="2">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Torre</th>
                                    <th>Propietario</th>
                                    <th>Cantidad Brazaletes</th>
                                    <th>Cantidad Personas</th>
                                    {_RESER_}
                                    {_MODIFICAR_}
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

    <!--<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html.min.js"></script>-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#reserva').DataTable({
                
            } );

            $('#capacidad').keyup(function(){
                var int = $('#capacidad').val();

                if (int > 8) {
                    Swal.fire('La Capacidad maxima es de 8 Personas');
                }
            });

            $('#opfecha').click(function(){

                var fi = $('#fechaini').val();
                var ff = $('#fechafi').val();

                if (fi > ff) {
                    alert("La fecha inicial no debe ser mayor a la fecha final");
                }else{
                    generarPDF_Reserva(fi,ff)
                }



            });


        } );

        function generarPDF(id){
            var ancho= 1000;
            var alto = 800;
            //calcular posicion y centrar la ventana
            var x= parseInt((window.screen.width/2) - (ancho / 2));
            var y= parseInt((window.screen.height/2) - (alto / 2));

            $url= '../recursos/reportes/generaReporte.php?id='+id;
            window.open($url,"Reporte","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
        }

         function generarPDF_Reserva(fi,ff){
            var ancho= 1000;
            var alto = 800;
            //calcular posicion y centrar la ventana
            var x= parseInt((window.screen.width/2) - (ancho / 2));
            var y= parseInt((window.screen.height/2) - (alto / 2));

            $url= '../recursos/reportes/generaReporteReserva.php?fi='+fi+'&ff='+ff;
            window.open($url,"Reporte","left="+x+",top="+y+",height="+alto+",width="+ancho+",scrollbar=si,location=no,resizable=si,menubar=no");
        }


         function modificarReserva(){
                var reserva = $('#nuevareserv').val();
                //var depanuereser = cod;
                var action = 'modiReserva';

                //alert(reserva);
                /*$.ajax({
                    url:'../include/ajax.php',
                    type:'POST',
                    async: true,
                    data: {action:action,reserva:reserva},


                    success:function(response){
                        console.log(response);
                        window.location.reload();
                    },


                    error:function(error){
                        console.log(error);
                    }

                });*/
            }
         


    </script>
</body>
</html>