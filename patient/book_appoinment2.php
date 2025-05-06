<?php 
	if (!isset($_SESSION)) {
		session_start();
	}  
?>

<!-- Esto es para la opción de selección -->
<?php
	$db = new mysqli('localhost','root','','sistema_medico_db'); // establece tu manejador de base de datos
	$query = "SELECT id, cat FROM category";
	$result = $db->query($query);

	while ($row = $result->fetch_assoc()) {
		$categories[] = array("id" => $row['id'], "val" => $row['cat']);
	}

	$query = "SELECT id, doctor_id, name FROM doctor";
	$result = $db->query($query);

	while ($row = $result->fetch_assoc()) {
		$subcats[$row['doctor_id']][] = array("id" => $row['id'], "val" => $row['name']);
	}

	$jsonCats = json_encode($categories);
	$jsonSubCats = json_encode($subcats);
?>
<!-- Esto es para la opción de selección -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>mms-patient</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="../style.css">

	 <!--  Esto es para la selección -->
	<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val, categories[i].id);       
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var doctor_id = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; // elimina todas las opciones si hay alguna presente
        for(var i = 0; i < subcats[doctor_id].length; i++){
          subcatSelect.options[i] = new Option(subcats[doctor_id][i].val, subcats[doctor_id][i].id);
        }
      }
    </script>

   <!--  Esto era para la selección -->
</head>
<body onload='loadCategories()'>

<?php

if ($_SESSION['donorstatus'] == "") {
	header("location:../patient_login.php");
}

?>

<?php include('uptomenu.php'); ?>

<!-- Esto es para el registro de donantes -->
<div class="recipient_reg" style="background-color:#272327;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Reserva de Cita</h3>

	<div class="formstyle" style="float: right;padding:25px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
		<form enctype="multipart/form-data" method="post" class="text-center">
			 <div class="col-md-12">
				  
			 		

					<label>
						<input type="email" name="email" placeholder="Tu correo electrónico registrado">	
					</label><br><br>
					<label>
						<input type="number" name="contact"  placeholder="Número de contacto registrado" required="required" pattern="[0-9]{10,11}" title="Por favor ingresa solo números entre 10 y 11 para el número de móvil."/>
					</label><br><br>
 					
 					
					<label>
						 <select id='categoriesSelect' name="cat" placeholder="elige tu Categoría">
      
   								 </select>
					</label><br><br>
					<label>
						<select id='subcatsSelect' name="name">
      
    							</select>
									
					</label><br><br>
					
					<label>
						<input type="date" name="dates" placeholder="elige tu fecha">	
					</label><br><br>
					<label>
						<select name="tyme">
									<option value="">-selecciona la hora-</option>
									<option value="9.00am-10.00am">09.00am-10.00am</option>
									<option value="10.00am-11.00am">10.00am-11.00am</option>
									<option value="11.00am-12.00pm">11.00am-12.00pm</option>
									<option value="12.00pm-01.00pm">12.00pm-01.00pm</option>
									<option value="03.00pm-04.00pm">03.00pm-04.00pm</option>
									<option value="04.00pm-05.00pm">04.00pm-05.00pm</option>
									<option value="05.00pm-06.00pm">05.00pm-06.00pm</option>
									<option value="07.00pm-08.00pm">07.00pm-08.00pm</option>
									<option value="08.00pm-09.00pm">08.00pm-09.00pm</option>
      
    						  </select>
									
					</label><br><br>

					<label>
						<select name="payment">
									<option value="">-Método de Pago-</option>
									<option value="DBBL Rocket">DBBL Rocket</option>
									<option value="1bKash">bKash</option>
						
    						  </select>
									
					</label><br><br>
					
					
					<button name="submit" type="submit" style="margin-left:12px;width:115px;border-radius: 3px;">Reservar</button> <br>
				
			</div>	<!-- col-md-12 -->


				</form>
			</div>




	</div>
	
	



	
	
 <?php include('../footer.php'); ?>


	
	</div>




	<script src="js/bootstrap.min.js"></script>


	 <!-- Validación e inserción -->


					<?php
						
							include('../config.php');
							if(isset($_POST['submit'])){

							$sql = "INSERT INTO booking (email, contact, cat, d_name, dates, tyme)
							VALUES ('" . $_POST["email"] . "','" . $_POST["contact"] . "','" . $_POST["cat"] . "', '" . $_POST["name"] . "','" . $_POST["dates"] . "','". $_POST["tyme"] . "' )";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('¡Tu reserva ha sido aceptada!');</script>";
							} else {
							    echo "<script>alert('Hubo un error')<script>";
							}

							$conn->close();
						}
					?> 



	<!-- Validación e inserción Fin-->



</body>
</html>
