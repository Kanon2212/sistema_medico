<?php if (!isset($_SESSION)) {
	session_start();
} ?>

<?php include('header.php'); ?>

<!-- Esta sección es para el registro de donantes -->
<div class="recipient_reg" style="background-color:#272327;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Agregar Doctor</h3>

	<div class="formstyle" style="float: right;padding:25px;border: 1px solid lightgrey;margin-right:320px; margin-bottom:30px;background-color: #101011;color:#d4530d;;">
		<form enctype="multipart/form-data" action="" method="post" class="text-center" style="margin-left: 110px">
			<div class="col-md-12">
				<label>
					<input type="text" name="name" value="" placeholder="Nombre completo" autocomplete="on">
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
					</select>
				</label><br><br>
				<label>
					<input type="text" name="userid" value="" placeholder="ID de usuario">
				</label><br><br>
				<label>
					<input type="text" name="fee" value="" placeholder="Honorarios">
				</label><br><br>
				<label>
					<input type="password" name="password" value="" placeholder="Contraseña">
				</label><br><br>
				<label>
					<input type="file" name="pic" value="" id="pic" required>
				</label><br><br>
				
				<button name="submit" type="submit" style="margin-left:148px;margin-top: 4px;width:95px;border-radius: 3px;height: 30px">Agregar Doctor</button> <br>
			</div> <!-- col-md-12 -->
		</form>
	</div>
</div>

<!-- Insertar datos -->
<?php  
	if(isset($_POST['submit'])){
		$target_dir = "../photo/";
		$target_file = $target_dir . basename($_FILES["pic"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		// Verificar si el archivo es una imagen real o falsa
		$check = getimagesize($_FILES["pic"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo "<script>alert('El archivo no es una imagen.');</script>";
			$uploadOk = 0;
		}

		// Verificar si el archivo ya existe
		if (file_exists($target_file)) {
			echo "<script>alert('Lo siento, el archivo ya existe.');</script>";
			$uploadOk = 0;
		}

		// Permitir solo ciertos formatos de archivo
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
			echo "<script>alert('Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.');</script>";
			$uploadOk = 0;
		} else {
			if(move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
				include('../config.php');
				$sql1 = "SELECT * FROM doctor WHERE userid='".$_POST["userid"]."' OR email='" . $_POST["email"] . "'";
				$result = $conn->query($sql1);
				if($result->num_rows > 0) {
					echo "<script>alert('Lo siento, el ID de usuario o el correo electrónico ya existen.');</script>";
				} else {
					$sql = "INSERT INTO doctor (name, address, contact, email, expertise, userid, fee, password, pic)
						VALUES ('" . $_POST["name"] . "','" . $_POST["address"] . "','" . $_POST["contact"] . "','" . $_POST["email"] . "', '" . $_POST["expertise"] . "','" . $_POST["userid"] . "','" . $_POST["fee"] . "','" . $_POST["password"] . "','" . basename($_FILES["pic"]["name"]) ."' )";

					if ($conn->query($sql) === TRUE) {
						echo "<script>alert('¡Nuevo doctor agregado exitosamente!');</script>";
					} else {
						echo "<script>alert('Hubo un error al agregar el doctor.');</script>";
					}
				}
				$conn->close();
			} else {
				echo "<script>alert('Lo siento, hubo un error al subir tu archivo.');</script>";
			}
		}
	}
?>
<!-- Insertar datos -->

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
