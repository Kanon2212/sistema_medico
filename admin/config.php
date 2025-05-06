<?php
function hacerConexion() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema_medico_db";

    // Crear la conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    return $conn;
}
?>
