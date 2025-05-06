<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistema de Gestión Médica</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>

	<div class="container">
		<div class="header_top">
			<span style="font-size:50px;color:#2c2f84;font-weight:bolder;margin-left:15px;">Sistema de Citas Médicas</span>
		</div>

	<!-- 	this is for menu -->
	<div class="navbar navbar-default nav">
		<nav class="menu">
			<ul>
				<li><a href="../index.php">Inicio</a></li>
			</ul>
		</nav>
	</div>

	<!-- this is for login -->
	<div class="login">
		<div class="formstyle" style="padding: 10px;border: 1px solid lightgrey;margin-right: 376px;margin-left: 406px; margin-bottom: 25px;background-color:black;">
			<form action="" method="post" class="text-center">
				<label>
					<input type="text" name="username" placeholder="nombre de usuario" required style="margin-right: 75px;">
				</label><br><br>
				<label>
					<input type="password" name="password" placeholder="contraseña" required style="margin-right: 75px;">
				</label><br><br>
				<button name="submit" type="submit" style="margin-top:3px;padding:3px 25px; border-radius:4px;float:right;margin-right:75px;">Iniciar sesión</button> <br>

				<!-- Validación de inicio de sesión -->
				<?php 
					$_SESSION['adminstatus'] = "";
					include('../config.php');
					if(isset($_POST["submit"])){
						$sql = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "' AND password = '" . $_POST["password"] . "'";

						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							$_SESSION["username"] = $_POST["username"];
							$_SESSION['adminstatus'] = "yes";
							echo "<script>location.replace('viewDoctor.php');</script>";
						} else {
							echo "<span style='color:red;'>Nombre de usuario o contraseña inválidos</span>";
						}
						$conn->close();		
					}
				?>
				<!-- Fin de validación de inicio de sesión -->
			</form>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
