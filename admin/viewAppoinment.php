<?php if (!isset($_SESSION)) {
	session_start();
} ?>

<?php include('header.php'); ?>

<!-- Esta sección es para el registro de pacientes -->
<div class="dashboard" style="background-color:#fff;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Pacientes que han tomado una cita</h3>
</div>

<div class="all_user" style="margin-top: 0px; margin-left: 40px;">
	<?php 
		include('../config.php');

		$sql = "SELECT * FROM booking";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if ($count >= 1) {
			echo "<table border='1' align='center' cellpadding='32'>
				<tr>
					<th>Nombre del Dr.</th>
					<th>Contacto</th>
					<th>Especialidad</th>
					<th>Paciente</th>
					<th>Contacto del Paciente</th>
					<th>Fecha</th>
					<th>Hora</th>
				</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$row['dname']."</td>";
				echo "<td>".$row['dcontact']."</td>";
				echo "<td>".$row['expertise']."</td>";
				echo "<td>".$row['pname']."</td>";
				echo "<td>".$row['pcontact']."</td>";
				echo "<td>".$row['dates']."</td>";
				echo "<td>".$row['tyme']."</td>";
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
