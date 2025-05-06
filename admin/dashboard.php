<?php 
if (!isset($_SESSION)) {
	session_start();
}  
?>

<?php include('header.php'); ?>

<!-- Registro de donante -->
<div class="dashboard" style="background-color:#fff;">
	<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Panel de Administración</h3>
	<span class="adminDashboard" style="font-size: 85px;font-weight: bold;color: blue;font-family: serif;margin-left: 180px;background-color: black;">Bienvenido al Panel de Administración</span>
</div>

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
