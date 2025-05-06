<?php if (!isset($_SESSION)) {
	session_start();
} ?>

<?php include('header.php'); ?>

<!-- Sección para registrar donantes -->
<div class="recipient_reg" style="background-color:#272327;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Agregar Doctor</h3>

	<div class="formstyle" style="float: right; padding:25px; border: 1px solid lightgrey; margin-right:320px; margin-bottom:30px; background-color: #101011; color:#d4530d;">
		<form enctype="multipart/form-data" method="post" class="text-center" style="margin-left: 110px">
			<div class="col-md-12">
				<label>
					<input type="text" name="doctor_id" value="" placeholder="ID del doctor">
				</label><br><br>
				<label>
					<input type="text" name="name" value="" placeholder="Nombre completo">
				</label><br><br>
				<label>
					<input type="text" name="address" value="" placeholder="Dirección">
				</label><br><br>
				<label>
					<input type="text" name="contact" value="" placeholder="Contacto">
				</label><br><br>
				<label>
					<input type="email" name="email" value="" placeholder="Correo electrónico">
				</label><br><br>
				<label>
					<select name="expertise">
						<option>-Especializado en-</option>
						<option>Medicina</option>
						<option>Cardiología</option>
						<option>Ortopedia</option>
						<option>Nefrología</option>
						<option>Cardiólogo</option>
						<option>Cirujano Plástico</option>
						<option>Médico General</option>
						<option>Neurólogo</option>
					</select>
				</label><br><br>
				<label>
					<input type="text" name="userid" value="" placeholder="ID de usuario">
				</label><br><br>
				<label>
					<input type="text" name="fee" value="" placeholder="Honorarios">
				</label><br><br>
				<label>
					<input type="file" name="t8" value="" id="t8" required>
				</label><br><br>
				
				<button name="submit" type="submit" style="margin-left:148px; margin-top: 4px; width:95px; border-radius: 3px; height: 30px;">Agregar Doctor</button> <br>
			</div> <!-- col-md-12 -->
		</form>
	</div>
</div>

<!-- Validación e inserción de datos -->
<?php
	if(isset($_POST["submit"])) {
		$target_dir = "doner_pic/";
		$target_file = $target_dir . basename($_FILES["t8"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		// Verificar si el archivo es una imagen real
		$check = getimagesize($_FILES["t8"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "El archivo no es una imagen.";
			$uploadOk = 0;
		}

		// Verificar si el archivo ya existe
		if (file_exists($target_file)) {
			echo "Lo siento, el archivo ya existe.";
			$uploadOk = 0;
		}

		// Permitir solo ciertos formatos de archivo
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
			$uploadOk = 0;
		} else {
			if(move_uploaded_file($_FILES["t8"]["tmp_name"], $target_file)) {
				include('../config.php');
				$sql = "INSERT INTO doctor (name, address, contact, email, expertise, userid, fee, pic)
						VALUES ('" . $_POST["name"] . "','" . $_POST["address"] . "','" . $_POST["contact"] . "','" . $_POST["email"] . "','" . $_POST["expertise"] . "','" . $_POST["userid"] . "','" . $_POST["fee"] . "','" . basename($_FILES["t8"]["name"]) . "')";

				if (mysqli_query($conn, $sql)) {
					echo "<script>alert('Registro guardado correctamente.');</script>";
				} else {
					echo "<script>alert('Error al guardar el registro.');</script>";
				}
				mysqli_close($conn);
			} else {
				echo "Lo siento, hubo un error al subir tu archivo.";
			}
		}
	}
?>
<!-- Validación e inserción de datos -->

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
