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
	<title>Sistema de Gestión Médica</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

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
<?php include('uptomenu.php'); ?>

<!-- Esto es para el registro de donantes -->
<div class="recipient_reg" style="background-color:#272327;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;">Reserva de Cita</h3>

	<div class="formstyle" style="float: right;padding:25px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color: #101011;color:#d4530d;;">
		<form enctype="multipart/form-data" method="post" class="text-center">
			 <div class="col-md-12">
				  
			 		
					<label>
						Categoría: <select id='categoriesSelect' name="categoriesSelect">
							
						</select>
					</label><br><br>
					<label>
						Doctor: <select id='subcatsSelect' name="subcatsSelect">
      
    							</select>
									
					</label><br><br>
					<button name="submit" type="submit" style="margin-left:12px;width:115px;border-radius: 3px;">Reservar</button> <br>
				
			</div>	<!-- col-md-12 -->
			</form>
			</div>

</div>
	
	
	</div>

	<script src="js/bootstrap.min.js"></script>


	 <!-- Validación e inserción -->


			<?php
							include('../config.php');
							if(isset($_POST['submit'])){
							
							$sql = "INSERT INTO booking (cat, d_name)
							VALUES ('" . $_POST["categoriesSelect"] . "', '" . $_POST["subcatsSelect"] . "' )";

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
