<?php 
	if (!isset($_SESSION)) {
		session_start();
	}  
?>
<?php include('header.php'); ?>


<div class="search" style="background-color:white;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Detalles del Cliente</h3>

	<div class="formstyle" style="padding: 10px;border: 1px solid lightgrey;margin-right: 376px;margin-left: 406px; margin-bottom: 25px;background-color:#f3f3f8;color:#141313;">
		<form action="" method="post" class="form-group">
			<label>
				<input type="text" name="search" placeholder="ID de reserva/teléfono/correo electrónico" required style="margin-right: 140px;">
			</label><br><br>

			<button name="submit" type="submit" style="float: right;margin-right:66px;margin-top: -38px;border-radius: 3px;padding: 4px">Buscar</button> <br>
		</form>
	</div>
</div>

<?php 
	include('../config.php');
	if (isset($_POST["submit"])) {
		$sql = "SELECT * FROM patient WHERE contact = '" . $_POST["search"] . "' OR email = '" . $_POST["search"] . "'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if ($count >= 1) {
			echo "<table border='1' align='center' cellpadding='32'>
				<tr>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Contacto</th>
					<th>Dirección</th>
					<th>Grupo Sanguíneo</th>
					<th>Email</th>
				</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['age']."</td>";
				echo "<td>".$row['contact']."</td>";
				echo "<td>".$row['address']."</td>";
				echo "<td>".$row['bgroup']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			print "<p align='center'>Lo siento, no se encontraron coincidencias para su búsqueda..!!!</p>";
		}
	}
?>

<?php include('../footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
