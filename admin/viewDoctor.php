<?php if (!isset($_SESSION)) {
	session_start();
} ?>

<?php include('header.php'); ?>

<!-- Esta sección es para el listado de todos los médicos registrados -->
<div class="dashboard" style="background-color:#fff;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Lista de todos los médicos registrados</h3>
</div>

<div class="all_user" style="margin-top: 0px; margin-left: 40px;">
	<?php 
		include('../config.php');

		$sql = "SELECT * FROM doctor";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if ($count >= 1) {
			echo "<table border='1' align='center' cellpadding='32'>
				<tr>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Móvil</th>
					<th>Email</th>
					<th>Especialidad</th>
					<th>Honorarios</th>
				</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['address']."</td>";
				echo "<td>".$row['contact']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['expertise']."</td>";
				echo "<td>".$row['fee']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			print "<p align='center'>Lo siento, no se encontraron resultados para tu búsqueda..!!!</p>";
		}

		mysqli_close($conn);
	?>
</div>

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
