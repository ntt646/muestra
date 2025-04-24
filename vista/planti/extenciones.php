<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de Extensión</title>
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
            <div id="titu" class="col-12" style="display: ">
                <center>
                    <h1>Extensiones</h1>
                </center>
            </div>

            <br>
            
            <div id="select" class="col-12" style="display: ">
                <center>
                    <label style="{_SEGURIDAD_}">Extencion de Vehiculos</label>
                    <button id="VehE" style="{_SEGURIDAD_}">Click</button>
                    <label style="{_CONTROL_}">Extencion de Fecha</label>
                    <button id="FecE" style="{_CONTROL_}">Click</button>
                    <label style="{_CONTROL_}">Carga Adicional de Brazalete</label>
                    <button id="BrzE" style="{_CONTROL_}">Click</button>
                </center>
            </div> 

            <div id="FE" style="display: none;">
                <div class="col-12" style="">
                    <h1 style="text-align: center;">Extensión de Fecha</h1>
                </div> 
                <div class="col-12">
                    <center>
                        {_FECHA_}
                    </center>
                </div>
                <br style="{_STYLE_FECHA_}"><br style="{_STYLE_FECHA_}">
            </div>
             
          <!--    Search form -->
            <div id="VE" style="display: none;">
                <div class="row tm-row" style="{_LLENO_}">
                    <div class="col-12">
                        <h1 style="text-align: center;">Extensión de Vehiculos</h1>
                    </div> 
                    <div class="col-12" style="margin-top: 20px;">
                        <center>
                            {_FORM3_}
                        </center> 
                    </div>
                    <br><br>
                    <!--<div class="col-12">
                        <div class="col-12">
                            <h1 style="text-align: center;">Vehiculos Cargados</h1>
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
                    </div>-->            
                </div>
            </div>

            <div id="brazalete" style="display: none;">
                <div class="col-12">
                    <h1 style="text-align: center;">Carga Adicional de Brazalete</h1>
                </div> 
                <div class="col-12" style="margin-top: 20px;">

                    <center>
                        {_P_}
                        {_FORM4_}
                        
                    </center> 
                </div>
            </div>

            <br>
            <div id="atras" class="col-12" style="display:none ">
                <center>
                    <button id="retro">Retroceder</button>
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

            $('#VehE').click(function(e){
            e.preventDefault();
           
            document.getElementById("select").style.display="none";
            document.getElementById("titu").style.display="none";
            document.getElementById("atras").style.display="block";
            document.getElementById("VE").style.display="block";
        
            });

            $('#FecE').click(function(e){
            e.preventDefault();
        
            document.getElementById("titu").style.display="none";
            document.getElementById("select").style.display="none";
            document.getElementById("atras").style.display="block";
            document.getElementById("FE").style.display="block";
    
            
            });

            $('#BrzE').click(function(e){
            e.preventDefault();
        
            document.getElementById("titu").style.display="none";
            document.getElementById("select").style.display="none";
            document.getElementById("atras").style.display="block";
            document.getElementById("brazalete").style.display="block";
    
            
            });

            $('#retro').click(function(e){
            e.preventDefault();
        
            document.getElementById("FE").style.display="none";
            document.getElementById("VE").style.display="none";
            document.getElementById("brazalete").style.display="none";
            document.getElementById("atras").style.display="none";
            document.getElementById("titu").style.display="block";
            document.getElementById("select").style.display="block";
    
            
            });
            
             
        });

      

    </script>
</body>
</html>