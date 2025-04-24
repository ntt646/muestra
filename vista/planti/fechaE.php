 <form method="POST" action="../controlador/insertarFechaExt.php" style="background-color: transparent; border: none;">
 	<label>Departamento</label><br>
    <input type="text" name="idfecha" id="idfecha" required>
    <br><br>

    <label>
    Fecha Hasta:
    <input type="date" name="fechafi" id="fechafi" style="width: 50%" required>
    </label>

    <label>
    Hora Hasta:
    <input type="time" name="horafi" id="horafi" style="width: 50%" required>
    </label>

    <br>
    <label>Observación</label>
    <br>
    <textarea id="obse" name="obse" required></textarea>
   
    <br>
    <button type="submit" name="opfecha" id="opfecha" style="background-color: #0c14ad;color: #fff;">Cargar</button>
    
</form>