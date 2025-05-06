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


<?php
		if($_SESSION['adminstatus'] == ""){
			header("location:adminlogin.php");
		}
		
		   

	 ?>


<div class="container-fluid">
		<div class="header_top">
			<span style="font-size:50px;color:#2c2f84;font-weight:bolder;margin-left:15px;">Sistema de Citas Médicas</span>
		</div>

	
	<div class="navbar navbar-default nav">
		<nav class="menu">
			<ul>
				
				
				
				<li><a href="addDoctor2.php">Agregar Doctor</a></li>
				<li><a href="viewDoctor.php">Ver Doctores</a></li>
				<li><a href="viewCustomer.php">Ver Pacientes</a></li>
				<li><a href="viewAppoinment.php">Ver Citas</a></li>
				<li><a href="viewFeedback.php">Ver Retroalimentación</a></li>
				<li><a href="logout.php">Cerrar Sesión</a></li>
			</ul>
		</nav>
	</div>
	
