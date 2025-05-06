<?php if(!isset($_SESSION)){
	session_start();
	}  
?>

<?php include('header.php'); ?>

<!-- esto es para el registro de donantes -->
<div class="recipient_reg" style="background-color:#272327;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Agregar Doctor</h3>

	<div class="formstyle" style="float: right;padding:25px;border: 1px solid lightgrey;margin-right:320px; margin-bottom:30px;background-color: #101011;color:#d4530d;;">
	<form enctype="multipart/form-data" method="post" class="text-center" style="margin-left: 110px">
		 <div class="col-md-12">
			  
		 		<label>
				    <input type="text" name="doctor_id" value="" placeholder="ID del doctor" required>
				</label><br><br>
				<label>
				    <input type="text" name="name" value="" placeholder="Nombre completo" required>
				</label><br><br>
				<label>
					 <input type="text" name="address" value="" placeholder="Dirección" required>
				</label><br><br>
				<label>
					 <input type="text" name="contact" value="" placeholder="Contacto" required>
				</label><br><br>

				<label>
					 <input type="email" name="email"  value="" placeholder="Correo electrónico" required>
				</label><br><br>
				
				<label>
					 <select name="expertise" required>
									<option>-Especialidad-</option>
									<option>Medicina</option>
									<option>Corazón</option>
									<option>Huesos</option>
									<option>Riñón</option>
									<option>Cardiólogo</option>
									<option>Cirujano Plástico</option>
									<option>Médico General</option>
									<option>Neurólogo</option>
								</select>
				</label><br><br>
				<label>
				     <input type="text" name="id" value="" placeholder="ID" required>
				</label><br><br>
				<label>
				   <input type="text" name="fee" value="" placeholder="Tarifa" required>
				</label><br><br>
				
				
				<button name="submit" type="submit" style="margin-left:148px;margin-top: 4px;width:95px;border-radius: 3px;height: 30px">Agregar</button> <br>
			
		</div>	<!-- col-md-12 -->


			</form>
		</div>

</div>

<!-- validación e inserción -->

<?php
	include('../config.php');
	if(isset($_POST['submit'])){
		
		$sql = "INSERT INTO doctor (doctor_id, name, address, contact, email, expertise, id, fee)
		VALUES ('" . $_POST["doctor_id"] ."','" . $_POST["name"] . "','" . $_POST["address"] . "','" . $_POST["contact"] . "','" . $_POST["email"] . "', '" . $_POST["expertise"] . "','" . $_POST["id"] . "','" . $_POST["fee"] . "' )";

		if ($conn->query($sql) === TRUE) {
		    echo "<script>alert('¡Nuevo doctor agregado exitosamente!');</script>";
		} else {
		    echo "<script>alert('Hubo un error');</script>";
		}

		$conn->close();
	}
?> 

<!-- validación e inserción final -->

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
