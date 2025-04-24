
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
                        <h1 style="text-transform: uppercase;">Consulta</h1>
                    </div>                
                </div>            
                <div class="row tm-row" id="consultablock" style="display: ">
                    <div class="col-12" style="margin-top: 20px;" >
                        {_C_}
                        {_FORM_}
                        
                    </div>
                </div>
                <div class="row tm-row" id="datosHuesped" style="{_STYLE_}">
                    <p>Desde: {_FECHAI_} Hasta: {_FECHAF_}</p>
                    <table id="familia" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                        <thead>
                            <tr>
                                <th>Chequeo</th>
                                <th>Nombres</th>
                                <th>apellidos</th>
                                <th>cedula</th>
                                <th>depa</th>
                                <th>torre</th>
                                <th>titular</th>
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

                <br><br>
                <div class="col-12" style="{_STYLE_}">
                    <div class="col-12">
                        <h1 style="text-align: center;">Vehiculo cargado</h1>
                    </div> 
                    <table id="cargaHM" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                        <thead>
                            <tr>
                                <th>Chequeo</th>
                                <th>Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Color</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            {_TABLA2_}
                        </tbody> 
                    </table>
                </div>
                <br><br>

                <div class="col-12" style="{_STYLE_}">
                
                    <div class="col-12">
                        <h1 style="text-align: center;">Trabajadores</h1>
                    </div> 
                    <table id="cargatr" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                        <thead>
                            <tr>
                                {_CAPACIDADT_}
                                <th>Nombres</th>
                                <th>apellidos</th>
                                <th>cedula</th>
                                <th>edad</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            {_TABLA4_}
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
            $('#huesped').DataTable({
            } );

            $('#codbr').keydown(function (e){
                e.preventDefault();

            
                var codigo= $('#codbr').val();
                var id = {_ID_}
                var codfami = $('#codfa').val();
                var action = 'cargaCodBrazalete';

                //alert(codigo+" "+id+" "+codfami);

                $.ajax({
                    url: '../modelo/consultas.php',
                    type: "POST",
                    async: true,
                    data:{action:action,id:id,codigo:codigo,codfami:codfami},

                    success: function(response)
                    {   
                        console.log(response);
                        if (response!='error') {

                            //window.location='../vista/inicioRecepcion.php?id='+id;
                        }else{
                            
                           Swal.fire('No existe un brazalete con ese codigo');

                        }
                            /*console.log(response);
                        

                            var info = JSON.parse(response);

                            $('#dentro').html(info.detalle);
                            $('#detalle_totales').html(info.totales);
                            $('#detalle_totales1').html(info.totales1);*/
                        
                    },

                    error: function(error){


                    }
                });
            
            });

           
            
           
        } );

    </script>
</body>
</html>