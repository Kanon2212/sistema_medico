<?php include('header.php'); ?>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/Autoload.php';
    include('config.php');

    if(isset($_POST['submit'])){
        $sql1 = "SELECT * FROM patient WHERE email='".$_POST["email"]."' ";
        $result = $conn->query($sql1);	
        
        if ($result->num_rows > 0) {
            echo "<script>alert('Lo siento, el usuario ya existe');</script>";
        } else {
            $sql = "INSERT INTO patient (name, age, contact, address, bgroup, email, password)
                    VALUES ('" . $_POST["name"] ."','" . $_POST["age"] . "','" . $_POST["contact"] . "','" . $_POST["address"] . "','" . $_POST["bgroup"] . "', '" . $_POST["email"] . "','" . $_POST["password"] . "' )";

            if ($conn->query($sql) === TRUE) {
                // Envío de correo electrónico
                $mail = new PHPMailer(true);

                try {
                    //Configuración del servidor SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'xxxxx';
                    $mail->Password = 'hsoqheamhjabjgxj';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    //Dirección del remitente y destinatario
                    $mail->setFrom('xxxxx', 'Half-life');  // Reemplaza con tu correo electrónico y nombre
                    $mail->addAddress($_POST['email']);

                    //Contenido del correo
                    $mail->isHTML(true);
                    $mail->Subject = 'Confirmación de registro';
                    $mail->Body    = '¡Gracias por registrarte!';

                    $mail->send();
                    echo "<script>location.replace('patient_success_msg.php');</script>";
                } catch (Exception $e) {
                    echo "<script>alert('Error al enviar el correo: {$mail->ErrorInfo}');</script>";
                }
            } else {
                echo "<script>alert('Hubo un error al registrar el usuario');</script>";
            }

            $conn->close();
        }
    }
?>

<!-- Registro de Pacientes -->
<div class="recipient_reg" style="background-color:#272327;">
    <h3 class="text-center" style="background-color:#272327;color: #fff;">Registro de Pacientes</h3>

    <div class="formstyle" style="float: right;padding:25px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
        <form enctype="multipart/form-data" method="post" class="text-center">
            <div class="col-md-12">
                <label>
                    Nombre completo: <input type="text" name="name" value="" placeholder="Nombre completo" required>
                </label><br><br>

                <label>
                    Edad: <input type="number" name="age"  placeholder="Edad" pattern="[0-9]{2,2}" title="Por favor, introduce solo números entre 2 y 2 para la edad"/>
                </label><br><br>

                <label>
                    Teléfono móvil: <input type="number" name="contact"  placeholder="Número de contacto" required pattern="[0-9]{10,11}" title="Por favor, introduce solo números entre 10 y 11 para el número de móvil"/>
                </label><br><br>
                
                <label>
                    Dirección: <input type="text" name="address" value="" placeholder="Dirección">
                </label><br><br>

                <label>
                    Grupo sanguíneo:
                    <select name="bgroup" required>
                        <option value="">-Seleccionar-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                    </select>
                </label><br><br>

                <label>
                    Correo electrónico: <input type="email" name="email"  value="" placeholder="Correo electrónico" required>
                </label><br><br>

                <label>
                    Contraseña: <input type="password" name="password"  value="" placeholder="Contraseña" required>
                </label><br><br>

                <button name="submit" type="submit" style="margin-left:60px;width: 85px;border-radius: 3px;">Registrar</button> <br>
            </div> <!-- col-md-12 -->
        </form>
    </div>
</div>

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
