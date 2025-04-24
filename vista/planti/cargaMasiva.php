<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carga Masiva</title>
	<link rel="stylesheet" href="../recursos/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../recursos/css/templatemo-xtra-blog.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../recursos/js/js2/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../recursos/css/style.css">
<!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>
<body>
	{_MENU_IZQ_}
    
    <div class="container-fluid" id="global" style="color: white;">
        <main class="tm-main">
            <div class="row tm-row">

                <div class="col-12">
                    <center>
                        <h1>Cargar Códigos de Brazaletes</h1>
                    </center>
                </div>
                <!-- Search form -->
                <form action="{_ACTION_}"  name="AgregarArchivo" method="POST" enctype=multipart/form-data>         
            
               
                    <div class="col-12 tm-post-col">
                        
                        <b>Archivo:</b>

                        <input type="file" class="form-control" id="archivo"  name="archivo[]" multiple="" required>
                        
                        <div class="col-lg-8" >
                            
                            <br>
                            <button type="submit"  class="btn btn-primary btn-lg" style="background-color: #e75105;">Subir Archivo</button>                                   
                        </div>
                        {_P_}
                    </div>
                    
                
                </form>
            </div>
            <input type="hidden" name="error" id="error" value="{_RSP_}">
            <br>
            <div class="row tm-row">
                <div class="col-12" style="margin-top: 20px;">
                    
                    <table id="carmas" class="table table-striped table-bordered" style="text-transform: uppercase; text-align: center;" border="2">
                        <thead>
                            <tr>
                                <th>Códigos</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                            {_TABLA_}
                        </tbody>
                        
                    </table>
                    
                </div>
            </div>
        </main>
    </div>
    
    <script src="../recursos/js/js2/jquery.js"></script>
    <script src="../recursos/js/js2/templatemo-script.js"></script>
    <script src="../recursos/js/j2/templatemo-script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../recursos/js/js2/datatable/datatables.min.js"></script>
    
       
    <script type="text/javascript">
        


        $(document).ready(function () {
            
            $('#carmas').DataTable({
            } );

            document.getElementById('archivo').addEventListener("change", () =>{
                var fileName = document.getElementById('archivo').value;
                var idDot = fileName.lastIndexOf(".") + 1;
                var extFile = fileName.substr(idDot, fileName.length).toLowerCase();
                //alert(extFile);

                if (extFile == 'xlsx' || extFile == 'xlsb' ) {
                    //TO DO
                }else{
                    swal.fire("MENSAJE DE ADVERTENCIA","Solo se admiten archivos excel usted esta insertando un archivo "+extFile,"warning");
                    document.getElementById('archivo').value='';
                }
            });
            
            
        });


    </script>
</body>
</html>