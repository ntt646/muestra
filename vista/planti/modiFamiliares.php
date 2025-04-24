<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación Familiares</title>
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
            <div class="row tm-row">
                <div class="col-12" style="margin-top: 20px;">
                    <center>
                        <form name="fvalida" action="../controlador/ModFamilia.php" method="POST" class="datos">
                            <input type="hidden" name="id" id="id" value="{_ID_}">
                            <input type="hidden" name="depa" id="depa" value="{_IDDEPA_}">

                

                            <div class="wd30">
                                <label name="nombre">Nombres:</label><br>
                                <input type="text" name="nombre" value="{_NOMBRE_}" >
                            </div>
                            <div class="wd30">
                                <label name="apellido">Apellidos:</label><br>
                                <input type="text" name="apellido" value="{_APELLIDO_}" >
                            </div>
                            <div class="wd30">
                                <label name="cedula">Cedula:</label><br>
                                <input type="numeric" name="cedula" value="{_CEDULA_}" >
                            </div>
                            <div class="wd30">
                                <label name="edad">Edad:</label><br>
                                <input type="numeric" name="edad" value="{_EDAD_}" >
                            </div>
            
                            <br>


                            <div id= 'botones' class="wd100">
                                <button type="submit" style="border: none; background:transparent;"><img src='../recursos/img/ck.png' width='32' height='32' title='Guardar' ></button>
                                <button type="button"  onclick="location.href='{_RUT_}={_IDDEPA_}'" style="border: none;background:transparent;"><img src='../recursos/img/anu.svg' width='32' height='32' title='Cancelar' ></button>
                            </div>
                        </form>
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
    
</body>
</html>