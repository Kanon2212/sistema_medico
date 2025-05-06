<?php 
    if (!isset($_SESSION)) {
        session_start();
    }  
?>

<?php include('header.php'); ?>


<!-- esto es para el registro de donantes -->
<div class="dashboard" style="background-color:#fff;">
    <h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Clientes</h3>
</div>

<div class="all_user" style="margin-top:0px; margin-left: 40px;">
    <?php 
        include('../config.php');
        $sql = "SELECT * FROM feedback";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count >= 1) {
            echo "<table border='1' align='center' cellpadding='32'>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Comentario</th>
                </tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['feedback']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            print "<p align='center'>Lo sentimos, no se encontraron resultados para su búsqueda..!!!</p>";
        }

        mysqli_close($conn);
    ?>
</div>

<?php include('footer.php'); ?>


</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
