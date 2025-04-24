 <form method="POST" action="../controlador/insertarFecha.php" style="background-color: transparent; border: none;">
    <input type="hidden" name="idfecha" id="idfecha" value="{_IDT_}">

    <label>Desde:
    <input type="date" name="fechaini" id="fechaini" style="width: 30%" required>
    Hasta:
    <input type="date" name="fechafi" id="fechafi" style="width: 30%" required>

    <br><br>
    <label>A partir:
    <input type="time" name="horaini" id="horaini" style="width: 65%" required>
    <br>
    Hasta:
    <input type="time" name="horafi" id="horafi" style="width: 65%" required>

    <br><br>
   
    <button type="submit" name="opfecha" id="opfecha" style="background-color: #0c14ad;color: #fff;">Cargar</button>
    </label>
</form>