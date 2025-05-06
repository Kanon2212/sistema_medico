<?php if (!isset($_SESSION)) {
	session_start();
} ?>

<?php include('header.php'); ?>

<!-- Esta sección es para el listado de pacientes -->
<div class="dashboard" style="background-color:#fff;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Lista de Pacientes</h3>
</div>

<div class="all_user" style="margin-top: 0px; margin-left: 40px;">
	<?php 
		include('../config.php');

		$sql = "SELECT * FROM patient";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if ($count >= 1) {
			echo "<table border='1' align='center' cellpadding='32'>
				<tr>
					<th>ID del Paciente</th>
					<th>Nombre del Paciente</th>
					<th>Edad</th>
					<th>Móvil</th>
					<th>Dirección</th>
					<th>Grupo Sanguíneo</th>
					<th>Email</th>
				</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
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
