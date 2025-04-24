
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Acceso</title>
    <link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="../recursos/css/templatemo-xtra-blog.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="../recursos/js/js2/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../recursos/css/style.css">

</head>
<body>
    
   <div class="container-fluid" id="global">
        <main class="tm-main" id="propi">
          <!--    Search form -->

            <div class="row tm-row" >
                <div class="col-12" style="{_STYLE_EST_}">
                    <h1 style="text-transform: uppercase; text-align: center;">{_TORRE_} Departamento {_DEPA_} </h1>
                    
                </div>                
            </div>  
            <br>
            <div class="row tm-row" style=" {_NO_MOROSO_}">
                <div class="col-12">
                    {_ERROR_}
                </div>                
            </div>   
            
            <div class="row tm-row" style=" display: ; {_MOROSO_} " id="datosFamilia">
                <div class="col-8" style="{_LLENOF_}">
                    <h2 style="text-transform: uppercase;">Cargar Familiares</h2>
                </div>  
                <div class="col-4" style="{_LLENOF_}">
                    <p style="text-transform: uppercase;">Cantidad Disponible: {_CONTEO_}</p>
                </div>  
                <div class="col-12" style="margin-top: 20px; {_LLENOF_}">
                    
                    {_FORM_}
                    <button id="finFamilia">Finalizar</button>
                </div>

                <br>
            </div>

            <div class="row tm-row" style="{_JS_} " id="datosInvitados">
                

                <div class="col-12" style="{_STYLE_FECHA_}">
                    <h1 style="text-align: center;">Fecha estadia</h1>
                </div>
                <div class="col-12" style="{_STYLE_FECHA_}">
                    <center>
                        {_FECHA_}
                    </center>
                </div>

                <br>

                <div class="col-8" style="{_INVITADOS_CLUB_}">
                    <h2 style="text-transform: uppercase;">Cargar Invitados Club</h2>
                     
                </div>

                <div class="col-4" style="{_INVITADOS_CLUB_}">
                    <p style="text-transform: uppercase;">Cantidad Disponible al club: {_CONTEO_}</p>
                </div> 

                <div class="col-12" style="margin-top: 20px;{_INVITADOS_CLUB_}">
                    {_P_}
                    
                    {_FORM2_}
                    
                </div>

                <br>

                 <div class="col-8" style="{_INVITADOS_DEPA_}">
                    <h2 style="text-transform: uppercase;">Cargar Invitados Departamento</h2>
                     
                </div>

                <div class="col-12" style="margin-top: 20px;{_INVITADOS_DEPA_}">
                    {_P_}
                    
                    {_FORM5_}
                    
                </div>

                <br>

                <div class="col-12" style="{_LLENO_}">
                    <h2 style="text-transform: uppercase;">Cargar Vehiculo</h2>
                </div> 
                <div class="col-12" style="margin-top: 20px;">
                    
                    {_FORM3_}
                    
                </div>

                

                 <div class="col-12" style="">
                    <h2 style="text-transform: uppercase;">Cargar Trabajador</h2>
                </div> 
                <div class="col-12" style="margin-top: 20px; ">
                    
                    {_FORM4_}
                    
                </div>
            </div>

            <br><br>
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
                                <th>Asistencia</th>
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

            <br>
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
            <br>

            <div class="col-12">
                <div class="col-12">
                    <h1 style="text-align: center;">Brazaletes Asociados</h1>
                </div> 
                <table id="cargaHM" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2" width="70%">
                    <thead>
                        <tr>
                            <th>Cógido Brazalete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        {_TABLA3_}
                    </tbody> 
                </table>
            </div>         
            <br>    
            <div class="">
                    <center>
                         <button type="submit" name="opfecha" id="opfecha" style="background-color: #0c14ad;color: #fff; font-size: x-large;font-weight: bold;" > <a href="../modelo/salir.php" style="color: white;">Salir</a></button>
                       
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
        } );

         function activo(cod){
                var idfam= cod;
                var action = 'asiste';

                $.ajax({
                    url: '../include/ajax.php',
                    type: "POST",
                    async: true,
                    data:{action:action,idfam:idfam},

                    success: function(response)
                    {
                        
                        window.location.reload();
                        console.log(response);

                    },

                    error: function(error){
                        
                    }
                });
            }

    </script>
</body>
</html>