<?php 
	if (!isset($_SESSION)) {
		session_start();
	}  
?>
<?php include('header.php'); ?>


<!-- para recuperar datos -->
<?php 
	include('../config.php');
	$sql = "SELECT * FROM doctor WHERE userid='" . $_SESSION["userid"] . "'";
	$q = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($q);
	$name = $data[2];
	$address = $data[3];
	$contact = $data[4];
	$email = $data[5];
	$userid = $data[9];
	$expertise = $data[6];
	$fee = $data[8];
	$pic = $data[11];

	mysqli_close($conn);
?>
<!-- fin para recuperar datos -->

<div class="login" style="background-color:#fff;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Mis Detalles</h3>
	<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
		<form action="" method="post" class="text-center form-group" enctype="multipart/form-data">
			<label>
				Foto: <input type="file" name="pic" value="../doctors-pic/<?php echo $pic; ?>" required>
			</label><br><br>
			<label>
				Tu Nombre: <input type="text" name="name" value="<?php echo $name; ?>" required>
			</label><br><br>
			<label>
				Dirección: <input type="text" name="address" value="<?php echo $address; ?>" required>
			</label><br><br>
			<label>
				Contacto: <input type="text" name="contact" value="<?php echo $contact; ?>" required>
			</label><br><br>
			<label>
				Email: <input type="email" name="email" value="<?php echo $email; ?>" required>
			</label><br><br>
			<label>
				Userid: <input type="text" name="userid" value="<?php echo $userid; ?>" disabled>
			</label><br><br>
			<label>
				Especialidad: <input type="email" name="email" value="<?php echo $expertise; ?>" disabled>
			</label><br><br>
			<label>
				Honorario: <input type="text" name="fee" value="<?php echo $fee; ?>" disabled>
			</label><br><br>
			
			<button name="submit" type="submit" style="margin-left:30px;width:108px;border-radius: 3px;">Actualizar Perfil</button> <br>
		</form>
		<br><br>
	</div>
</div>

<!-- Actualizar información -->
<?php
	include('../config.php');
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$pic = $_FILES['pic']['name'];

		$sql = "UPDATE doctor SET name='$name', address='$address', contact='$contact', email='$email', pic='$pic' WHERE userid='" . $_SESSION["userid"] . "'";

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Registro actualizado exitosamente');</script>";
		} else {
			echo "<script>alert('Hubo un error al actualizar el perfil');</script>";
		}

		mysqli_close($conn);
	}
?> 
<!-- Fin Actualizar información -->

<?php include('../footer.php'); ?>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
