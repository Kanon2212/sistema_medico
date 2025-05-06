<?php include('header.php'); ?>
<?php include('Admin/function.php'); ?>

<!-- esto es para el registro de contactos -->
<div class="contact" style="background-color: #7faf81;">
    <h1 class="text-center">Contáctanos</h1>
    <form enctype="multipart/form-data" method="post" class="text-center">
        Nombre:<input type="text" name="t1" required="required" pattern="[a-zA-Z _]{2,15}" title="por favor ingresa solo caracteres entre 2 y 15 para el nombre" /> <br>
        Correo electrónico:<input type="email" name="t2" required="required" /> <br>
        Teléfono móvil:<input type="number" name="t3" pattern="[0-9]{10,12}" title="por favor ingresa solo números entre 10 y 12 para el número de móvil" /> <br>
        Asunto:<textarea name="t4"></textarea> <br>
        <input type="submit" value="Enviar" name="sbmt">
    </form>
</div>

<?php include('footer.php'); ?>

<script src="js/bootstrap.min.js"></script>
<?php include('regivalidate.php'); ?>

<?php
if (isset($_POST["sbmt"])) {
    $cn = hacerConexion();

    $s = "INSERT INTO contacts (name, email, mobile, subj) VALUES ('" . $_POST["t1"] . "', '" . $_POST["t2"] . "', '" . $_POST["t3"] . "', '" . $_POST["t4"] . "')";

    $q = mysqli_query($cn, $s);
    mysqli_close($cn);
    if ($q) {
        echo "<script>alert('Registro guardado');</script>";
    } else {
        echo "<script>alert('Error al guardar el registro');</script>";
    }
}
?>
</body>
</html>
