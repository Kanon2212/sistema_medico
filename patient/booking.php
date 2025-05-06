<?php 
if (!isset($_SESSION)) {
	session_start();
}  
?>
<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>

	
<!-- Resultado -->
<?php 
$doc_id = isset($_GET['doc_id']) ? $_GET['doc_id'] : "";
	
?>
<!-- Recuperación de información del doctor -->
<?php 
include('../config.php');

$sql = "SELECT * FROM doctor WHERE doc_id = $doc_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$doc_id = $row["doc_id"];
		$name = $row["name"];
		$expertise = $row["expertise"];
		$contact = $row["contact"];
		$fee = $row["fee"];
		$userid = $row["userid"];
	}
}

$conn->close();
?>
<!-- Fin de recuperación de información del doctor -->

<!-- Información de reserva -->
<div class="login" style="background-color:#fff;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Reservar Cita</h3>
	<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
		<form action="" method="post" class="text-center form-group" enctype="multipart/form-data">
			<label>
				Dr. Nombre: <input type="text" name="dname" value="<?php echo $name; ?>" >
			</label><br><br>
			<label>
				Contacto: <input type="text" name="dcontact" value="<?php echo $contact; ?>" />
			</label><br><br>
			<label>
				Categoría: <input type="text" name="expertise" value="<?php echo $expertise; ?>" >
			</label><br><br>
			<label>
				Honorario: <input type="text" name="fee" value="<?php echo $fee; ?>" >
			</label><br><br>
			<label>
				Tu Nombre: <input type="text" name="pname" value="">
			</label><br><br>
			<label>
				Contacto: <input type="text" name="pcontact" value=""/>
			</label><br><br>
			<label>
				Correo Electrónico: <input type="email" name="email" value=""/>
			</label><br><br>
			<label>
				Dirección: <input type="text" name="address" value="">
			</label><br><br>
			<label>
				Fecha: <input type="date" name="dates" value="">
			</label><br><br>
			<label>
				Hora: <select name="tyme" required>
						<option value="">-seleccionar-</option>
						<option value="11.00am">11.00am</option>
						<option value="03.00pm">03.00pm</option>
					</select>
			</label><br><br>
			<label>
				Pago: <select name="payment" required>
						<option value="">-seleccionar-</option>
						<option value="Efectivo">Efectivo</option>
						<option value="Tarjeta">Tarjeta</option>
					</select>
			</label><br><br>
			<input type="hidden" name="userid" value="<?php echo $userid; ?>">
			<button name="submit" type="submit" style="padding-right:5px;border-radius:3px;margin-right:1px;">Confirmar</button> 
			<a href="search_doctor.php"><button name="" type="" style="padding-right:5px;border-radius:3px;margin-right:-150px;">Cancelar</button></a> <br>
		</form> <br><br>
	</div>
</div>
<!-- Fin de información de reserva -->

<!-- Confirmación de reserva -->
<?php
include('../config.php');
if (isset($_POST['submit'])) {
	$sql = "INSERT INTO booking (dname, userid, dcontact, expertise, fee, pname, pcontact, email, address, dates, tyme, payment)
			VALUES ('" . $_POST["dname"] . "','" . $_POST["userid"] . "','" . $_POST["dcontact"] . "','" . $_POST["expertise"] . "', '" . $_POST["fee"] . "','" . $_POST["pname"] . "','". $_POST["pcontact"] . "','". $_POST["email"] . "','". $_POST["address"] . "','". $_POST["dates"] . "','". $_POST["tyme"] . "','". $_POST["payment"] . "' )";

	if ($conn->query($sql) === TRUE) {
		echo "<script>alert('¡Tu reserva ha sido aceptada!');</script>";
	} else {
		echo "<script>alert('Hubo un error');</script>";
	}

	$conn->close();
}
?> 
<!-- Fin de confirmación de reserva -->

<?php include('footer.php'); ?>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
