<!-- Confirmación de reserva -->
<?php
include('../config.php');
if(isset($_POST['submit'])){
    
    // Variables de conexión a la base de datos ya definidas en 'config.php'

    // Crear la consulta SQL para insertar los datos de la reserva en la tabla 'booking'
    $sql = "INSERT INTO booking (dname, dcontact, expertise, fee, pname, pcontact, address, dates, tyme, payment)
            VALUES ('" . $_POST["dname"] . "','" . $_POST["dcontact"] . "','" . $_POST["expertise"] . "', '" . $_POST["fee"] . "','" . $_POST["pname"] . "','" . $_POST["pcontact"] . "','" . $_POST["address"] . "','" . $_POST["dates"] . "','" . $_POST["tyme"] . "','" . $_POST["payment"] . "' )";

    // Ejecutar la consulta y verificar si se realizó correctamente
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('¡Su reserva ha sido aceptada!');</script>";
    } else {
        echo "<script>alert('Hubo un error')<script>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?> 
<!-- Fin de confirmación de reserva -->
