<form name="fvalida" action="{_SUBMIT_}" method="POST" class="datos">
    <input type="hidden" name="id" id="id" value="{_IDT_}">

    <div class="wd30">
      
      <table class="table table-striped table-bordered">
            <thead>
                <tr>
                  <th style="width: 25%;">Nombres</th>
                  <th style="width: 25%;">Apellido</th>
                  <th style="width: 10%;">Cedula</th>
                  <th style="width: 10%;">Edad</th>
                  <th style="width: 10%;">Fecha Inicio</th>
                  <th style="width: 10%;">Fecha Fin</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td ><input type="text" name="nombre" style="width: 100%;" ></td>
                  <td ><input type="text" name="apellido" style="width: 100%;"></td>
                  <td ><input type="numeric" name="cedula" style="width: 100%;" required></td>
                  <td ><input type="numeric" name="edad" style="width: 100%;"></td>
                  <td ><input type="date" name="fechainit" style="width: 100%;" required></td>
                  <td ><input type="date" name="fechafit" style="width: 100%;" required></td>
                </tr>
              
            </tbody>
      </table>

    </div>


    <div id= 'botones' class="wd100">
        <center>
          <button type="submit" style="border: none; background:transparent;"><img src='../recursos/img/ck.png' width='32' height='32' title='Guardar' ></button>
        </center>
    </div>
</form>