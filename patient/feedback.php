<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>

<div class="login" style="background-color:#fff;">
    <h3 class="text-center" style="background-color:#272327;color: #fff;">Mi Opinión</h3>
    <div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
        <form action="" method="post" class="text-center form-group">
            <label>
                <span>Opinión:</span><textarea name="feedback" id="" cols="40" rows="4" required></textarea>
            </label><br><br>
            
            <button name="submit" type="submit" style="margin-left: -26px;width: 85px;border-radius: 3px;">Enviar</button> <br>

            <?php 
                include('../config.php');
                if(isset($_POST['submit'])){
                    $sql = "INSERT INTO feedback (email, feedback) VALUES ('" . $_SESSION["email"] . "','" . $_POST["feedback"] . "')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('¡Gracias por tu opinión!');</script>";
                    } else {
                        echo "<script>alert('Hubo un error');</script>";
                    }

                    $conn->close();
                }
            ?>
        </form> <br>&nbsp;&nbsp;&nbsp;
        
        <br>
    </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>
