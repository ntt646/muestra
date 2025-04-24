
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
<body id="img">
    
   <div class="container-fluid" id="global">
        
          <!--    Search form -->
        <main class="tm-main"> 
            <div class="row tm-row" >
                <div class="col-12" style="{_STYLE_EST_}">
                    <h1 style="text-transform: uppercase; text-align: center;">{_TORRE_} Departamento {_DEPA_} </h1>

                </div>                
            </div>  
            <br>
            
            
            <div class="row tm-row" style=" display: ; {_MOROSO_} " id="datosFamilia">
                <div class="col-8" style="{_LLENOF_}">
                    <h2 style="text-transform: uppercase;">Cargar Familiares</h2>
                </div>  
                <div class="col-4" style="{_LLENOF_}">
                    <p style="text-transform: uppercase;">Cantidad Disponible: {_CONTEO_}</p>
                </div>  
                <div class="col-12" style="margin-top: 20px; {_LLENOF_}">
                    
                    {_FORM_}
                    
                </div>

                <br>

                <div class="col-12" style="margin-top: 20px;">
                    <center>
                        {_FORM3_}
                    </center> 
                </div>
            </div>

            <br>
            <div class="col-12">
                <div class="col-12">
                    <h1 style="text-align: center;">Huespedes cargados</h1>
                </div> 
                <table id="cargaHM" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                    <thead>
                        <tr>
                             <th>Nombres</th>
                                <th>apellidos</th>
                                <th>cedula</th>
                                <th>edad</th>
                                <th>titular</th>
                                <th>Clasificacion</th>
                                <th style="{_STYLE_COLUMNA_}">modificar</th>
                                <th style="{_STYLE_COLUMNA_}">eliminar</th>
                                <th style="{_STYLE_COLUMNA2_}">Conteo</th>
                        </tr>
                    </thead>
                    <tbody>
                        {_TABLA_}
                    </tbody> 
                </table>
            </div>    
            <br>
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
            <div >
                <center>
                  <a href="../modelo/salir.php" >Salir</a>
                </center>
            </div>            
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

            $('#finFamilia').click(function(e){
            e.preventDefault();
            var action = 'finFamilia';
            var block = 2;
            var depa = {_IDF_};
            document.getElementById("datosFamilia").style.display="none";
            document.getElementById("datosInvitados").style.display="block";

            $.ajax({
                url:'../modelo/consultas.php',
                type:'POST',
                async: true,
                data: {action:action,block:block,depa:depa},

                success:function(response){
                    
                },


                error:function(error){
                    console.log(error);
                }

            });


            });

            $('#fechafi').keyup(function(e){
            
                if ($('#fechafi').val() < $('#fechaini').val()) {
                    //alert("La fecha final no puede ser menor a la fecha inicial");
                Swal.fire("Alerta", "la fecha final no puede ser menor a la fecha inicial");

                }

            });

            setTimeout(contra(),15000);

            function contra(){
                var user = '{_DEPA_}'
                var action = 'password'
                $.ajax({
                    url:'../include/ajax.php',
                    type:'POST',
                    async: true,
                    data: {action:action,user:user},


                    success:function(response){
                        console.log(response);
                    },


                    error:function(error){
                        console.log(error);
                    }

                });
            }
            


        } );

         

    </script>
</body>
</html>