<?php include('header.php'); ?>


<!-- Mensaje de felicitaciones -->
<div class="login" style="background-color:#fff;">
    <h1 class="text-center" style="background-color:#272327;color: #fff;">¡Enhorabuena...!!!</h1>
    <p class="text-center">¡Te has registrado correctamente!</p>
    <div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
        <form action="" method="post" class="text-center">
            <label>
                Email: <input type="email" name="email"  placeholder="Correo electrónico" required>
            </label><br><br>
            <label>
                Contraseña: <input type="password" name="password"  placeholder="Contraseña" required>
            </label><br><br>
            <button name="submit" type="submit" style="margin-left:36px;width: 85px;border-radius: 3px;">Iniciar sesión</button> <br>

            <!-- Validación de inicio de sesión -->
            <?php 
                include('config.php');
                if(isset($_POST["submit"])){
                    $sql= "SELECT * FROM patient WHERE email= '" . $_POST["email"]."' AND password= '" . $_POST["password"]."'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<script>location.replace('patient/dashboard.php');</script>";
                    } else {
                        echo "<span style='color:red;'>Por favor, verifica el nombre de usuario y la contraseña.</span>";
                    }
                    $conn->close();		
                }
            ?>
            <!-- Fin de la validación de inicio de sesión -->
        </form> <br>&nbsp;&nbsp;&nbsp;
    </div>
</div>

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
