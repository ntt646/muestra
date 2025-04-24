 <form method="POST" action="../controlador/cargaAdicionalBraza.php" style="background-color: transparent; border: none;">
 	<label>Departamento</label>
    <br>
    <input type="text" name="depab" id="depab" value="" required>
    <br>

    <label>Código de Brazalete Anterior</label>
    <br>
    <input type="text" name="codA" id="codA" value="" required>
    <br>

    <label>Código de Brazalete Nuevo</label>
    <br>
    <input type="text" name="cod" id="cod" required>

    <br>
    <label>Observación</label>
    <br>
    <textarea id="obser" name="obser" required></textarea>

    <br><br>
    <button type="submit" style="background-color: #0c14ad;color: #fff;">Cargar</button>
    </label>
</form>