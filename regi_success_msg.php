<?php include('header.php'); ?>

<?php include('Admin/function.php'); ?>


<!-- Sección de registro de donantes -->
<div class="login" style="background-color:#fff;">
    <h1 class="text-center" style="background-color:#272327;color: #fff;">¡Enhorabuena....!!!</h1>
    <p class="text-center">¡Te has registrado correctamente!</p>
    <div class="formstyle" style="float: right;padding: 10px;border: 1px solid lightgrey;margin-right: 376px; margin-bottom: 10px;background-color: aliceblue;">
        <form action="" method="post" class="text-center">
            <label>
                Email: <input type="email" name="email"  placeholder="Correo electrónico" required>
            </label><br><br>
            <label>
                Contraseña: <input type="password" name="password"  placeholder="Contraseña" required>
            </label><br><br>
            <button name="submit" type="submit">Iniciar sesión</button> <br> <br>

            <!-- Validación de inicio de sesión -->
            <?php 
                if(isset($_POST["submit"])){
                    include('config.php');

                    $sql= "SELECT * FROM registration WHERE email= '" . $_POST["email"]."' AND password= '" . $_POST["password"]."'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<script>location.replace('donor/dashboard.php');</script>";
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
