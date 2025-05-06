<?php 
	if (!isset($_SESSION)) {
		session_start();
	}  
?>

<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>

<!-- Esto es para el registro de citas -->
<div class="recipient_reg" style="background-color:#272327;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Reserva de Cita</h3>

	<div class="formstyle" style="float: right;padding:25px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color: #101011;color:#d4530d;">
		<form enctype="multipart/form-data" method="post" class="text-center">
			 <div class="col-md-12">
				  
			 		<label>
					   Nombre: <input type="text" name="name" value="" placeholder="Nombre completo" required>
					</label><br><br>

					<label>
						Email: <input type="email" name="email"  value="" placeholder="Correo electrónico" required>
					</label><br><br>
					
					<label>
						Teléfono: <input type="number" name="contact"  placeholder="Número de contacto" required="required" pattern="[0-9]{10,11}" title="Por favor ingrese solo números entre 10 y 11 para el número de móvil."/>
					</label><br><br>
 					
 					<label>
						Dirección: <input type="text" name="address" value="" placeholder="Dirección" required>
					</label><br><br>
					<label>
						Categoría: <select name="expertise" required>
										<option>-Seleccionar-</option>
										<option>Medicina</option>
										<option>Corazón</option>
										<option>Huesos</option>
										<option>Riñón</option>
										<option>Cardiólogo</option>
										<option>Cirujano Plástico</option>
										<option>Médico General</option>
									</select>
					</label><br><br>
					<label>
						Doctor: <select name="doctor" required>
										<option>-Seleccionar-</option>
										<option>Doctores de Medicina</option>
										<option>Doctores de Corazón</option>
										<option>Doctores de Huesos</option>
										<option>Doctores de Riñón</option>
										<option>Doctores Cardiólogos</option>
										<option>Doctores Cirujanos Plásticos</option>
										<option>Doctores Médicos Generales</option>
									</select>
					</label><br><br>
					
					<label>
						Fecha: <input type="date" name="date" placeholder="Selecciona tu fecha" >	
					</label><br><br>
					
					
					<button name="submit" type="submit" style="margin-left:60px;width: 85px;border-radius: 3px;">Comprobar</button> <br>
				
			</div>	<!-- col-md-12 -->


				</form>
			</div>




	</div>
	
	



	
	
 <?php include('footer.php'); ?>


	
	</div>




	<script src="js/bootstrap.min.js"></script>


	 <!-- Validación e inserción -->


			<?php
						
							include('../config.php');
							if(isset($_POST['submit'])){

							$sql = "INSERT INTO patient (name,age,contact,address,bgroup,email, password)
							VALUES ('" . $_POST["name"] ."','" . $_POST["age"] . "','" . $_POST["contact"] . "','" . $_POST["address"] . "','" . $_POST["bgroup"] . "', '" . $_POST["email"] . "','" . $_POST["password"] . "' )";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>location.replace('patient_success_msg.php');</script>";
							} else {
							    echo "<script>alert('Hubo un error')<script>" . $sql . "<br>" . $conn->error;
							}

							$conn->close();
						}
					?> 



	<!-- Validación e inserción Fin-->



</body>
</html>
