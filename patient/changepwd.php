<?php 
if (!isset($_SESSION)) {
	session_start();
}  
?>

<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>

<!-- Cambio de contraseña -->
<div class="dashboard" style="background-color:#fff;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Cambiar Contraseña</h3>
	<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
		<form action="" method="post" class="text-center">
			<label>
				<span style="color: #000">Contraseña Actual:</span><input type="password" name="password"  placeholder="Contraseña actual" required>
			</label><br><br>
			<label>
				<span style="color: #000">Nueva Contraseña:</span><input type="password" name="newpassword"  placeholder="Nueva contraseña" required>
			</label><br><br>
			<label>
				<span style="color: #000">Confirmar Contraseña:</span><input type="password" name="confpassword"  placeholder="Confirmar contraseña" required>
			</label><br><br>
			<button name="submit" type="submit" style="border-radius: 3px;color:#000;margin-right: -51px;">Actualizar Contraseña</button> <br>

			<?php 
			include('../config.php');
			if (isset($_POST["submit"])) {
				$sql = "SELECT * FROM patient WHERE email = '" . $_SESSION["email"] . "' AND password = '" . $_POST["password"] . "'";
				$query = mysqli_query($conn, $sql);
				$row = mysqli_num_rows($query);

				if ($row > 0) {
					// Verificar la nueva contraseña
					$newpassword = $_POST["newpassword"];
					$confpassword = $_POST["confpassword"];

					if ($newpassword == $confpassword) {
						$sql1 = "UPDATE patient SET password = '" . $_POST["newpassword"] . "' WHERE email = '" . $_SESSION["email"] . "'";
						mysqli_query($conn, $sql1);
						mysqli_close($conn);
						echo "<script>alert('La contraseña ha sido actualizada');</script>";
					} else {
						echo "<script>alert('Las contraseñas no coinciden');</script>";
					}
				} else {
					echo "<script>alert('Introduce la contraseña correcta');</script>";
				}
			}
			?>
		</form> <br>&nbsp;&nbsp;&nbsp;
		<br>
	</div>
</div>
<!-- Fin Cambio de contraseña -->

<?php include('../footer.php'); ?>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
