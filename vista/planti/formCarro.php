<form name="fvalida" action="{_SUBMIT_}" method="POST" class="datos">
    <input type="hidden" name="id" id="id" value="{_IDC_}">

    <div class="wd30">
      
      <table class="table table-striped table-bordered">
            <thead>
                <tr>
                  <th style="width: 25%;">Placa</th>
                  <th style="width: 25%;">Modelo</th>
                  <th style="width: 25%;">Marca y Año</th>
                  <th style="width: 15%;">Color</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td ><input type="text" name="placa" style="width: 100%;" required></td>
                  <td ><input type="text" name="modelo" style="width: 100%;" required></td>
                  <td ><input type="text" name="marca" style="width: 100%;" required></td>
                  <td ><input type="text" name="color" style="width: 100%;" required></td>
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