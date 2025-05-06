<?php session_start(); ?>
<?php include('header.php'); ?>

<!-- Sección de inicio de sesión para donantes/buscar -->
<div class="login" style="background-color:#fff;">
    <h3 class="text-center" style="background-color:#272327;color: #fff;">Inicio de Sesión para Donantes/Buscadores</h3>
    <div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color: #101011;color: #0d0623;">
        <form action="" method="post" class="text-center form-group">
            <label>
                Correo electrónico: <input type="email" name="email"  placeholder="correo electrónico" required>
            </label><br><br>
            <label>
                Contraseña: <input type="password" name="password"  placeholder="contraseña" required>
            </label><br><br>
            <button name="submit" type="submit" style="margin-left:36px;width: 85px;border-radius: 3px;">Iniciar Sesión</button> <br>

            <span style="color:#fff;">¿Aún no eres miembro?</span> <a href="DonorSeekerReg.php" title="crear una cuenta" target="" style="color:#fff;">&nbsp;Regístrate</a> <br>

            <!-- Validación de inicio de sesión -->
            <?php 
                $_SESSION['donorstatus'] = "";

                if(isset($_POST["submit"])){
                    include('config.php');

                    $sql = "SELECT * FROM registration WHERE email= '" . $_POST["email"] . "' AND password= '" . $_POST["password"] . "'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $_SESSION["email"] = $_POST["email"];
                        $_SESSION["donar_id"] = $_POST["donar_id"]; // Asumiendo que se debe guardar el ID del donante
                        $_SESSION['donorstatus'] = "yes";
                        echo "<script>location.replace('donor/dashboard.php');</script>";
                    } else {
                        echo "<span style='color:red;'>Usuario o contraseña incorrectos</span>";
                    }
                    $conn->close();
                }
            ?>
            <!-- Fin de la validación de inicio de sesión -->

        </form> <br>&nbsp;&nbsp;&nbsp;
        
        <br>

    </div>
</div>

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
