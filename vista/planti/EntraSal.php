<form method="POST" action="../controlador/cargarHora.php">
	<label>Brazalete</label>
    <br>

    <input type="number" name="brz" id="brz" placeholder="Codigo del Brazalete">
    <br>

    <label>Placa Vehiculo</label>
    <br>

    <input type="text" name="placa" id="placa" placeholder="Placa de Vehiculo">
    <br>

    <label style="margin-top: 10px;">Lugar</label>
    <br>

    <select name="lugar" id="lugar" required="Lugar de Salida o entrada">
    	<option>Selecciona</option>
    	<option value="1">Entrada Principal</option>
    	<option value="2">Puerta Playa</option>
    </select>
    <br>

    <label style="margin-top: 10px;">Entrada/Salida</label>
    <br>

    <select name="es" id="es" required="Seleccione si es entrada o salida">
    	<option>Selecciona</option>
    	<option value="1">Entrada</option>
    	<option value="2">Salida</option>
    </select>
    <br>

    <button id="consulta" style="margin-top: 10px;">Aceptar</button>
</form>