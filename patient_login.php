<?php session_start();  ?>
<?php include('header.php'); ?>


<!-- Formulario de inicio de sesión para pacientes -->
<div class="login" style="background-color:#fff;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Inicio de Sesión de Pacientes</h3>
	<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
		<form action="" method="post" class="text-center form-group">
			<label>
				<input type="email" name="email"  placeholder="Correo electrónico" required>
			</label><br><br>
			<label>
				<input type="password" name="password"  placeholder="Contraseña" required>
			</label><br><br>
			<button name="submit" type="submit" style="margin-left: -26px;width: 85px;border-radius: 3px;">Iniciar Sesión</button> <br>

			<span style="color:#000;">¿No eres miembro aún?</span> <a href="patient_regi.php" title="crear una cuenta" target="" style="color:#000;">&nbsp;Regístrate</a> <br>

			<!-- Validación de inicio de sesión -->
			<?php 
				$_SESSION['patient']="";
				include('config.php');
				if(isset($_POST["submit"])){
					$sql= "SELECT * FROM patient WHERE email= '" . $_POST["email"]."' AND password= '" . $_POST["password"]."'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						$_SESSION["email"]= $_POST["email"];
						$_SESSION['patient']= "yes";
						echo "<script>location.replace('patient/dashboard.php');</script>";
					} else {
						echo "<span style='color:red;'>Usuario o contraseña incorrectos</span>";
					}
					$conn->close();		
				}
			?>
			<!-- Fin de la validación de inicio de sesión -->
		</form> <br>&nbsp;&nbsp;&nbsp;
		<br>
	</div>
</div>
	
<?php include('footer.php'); ?>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
