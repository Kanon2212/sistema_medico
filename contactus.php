<?php include('header.php'); ?>




	<!-- esto es para el registro de donantes -->
	<div class="contactus"  style="background-color:#fff;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;">Contáctanos</h3>

		
		
		<div class="main_content">
			<div class="col-md-6" style="border-right: 2px solid black;">
				<article>
					
				</article>
			</div>
			<div class="col-md-6">
				<h2 class="text-center">Tu mensaje</h2>
				<form action="" method="post" class="text-center">
						<label>
								Nombre: <input type="text" name="firstname" value="" placeholder="nombre" required>
						</label><br><br>

						<label>
								Apellido: <input type="text" name="lastname" value="" placeholder="apellido" required>
						</label><br><br>	

						<label>
								Email: <input type="email" name="email"  value="" placeholder="Tu correo electrónico" required>
						</label><br><br>
						<label>
								Tu comentario: <textarea name="comment" id="" cols="30" rows="4" required></textarea> 
						</label><br><br>
								
						<input type="submit" value="Enviar" name="submit" style="margin-top: 75px;border-radius: 2px;"/>
					</form><br><br><br>
			</div>

          
 		</div>

	</div>
	
	

	
 <?php include('footer.php'); ?>


	
	</div>




	<script src="js/bootstrap.min.js"></script>


 
<!-- inserción de información de contacto -->
					<?php

						include('config.php');
						if(isset($_POST['submit'])){
							

							$sql = "INSERT INTO contact (firstname, lastname,email,comment)
							VALUES ('" . $_POST["firstname"] ."','" . $_POST["lastname"] . "','" . $_POST["email"] . "','" . $_POST["comment"] . "' )";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>location.replace('success.php');</script>";
							} else {
							    echo "<script>alert('Hubo un error')</script>";
							}

							$conn->close();
						}
					?> 



	
</body>
</html>
