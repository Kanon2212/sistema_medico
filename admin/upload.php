<?php
    
        $target_dir = "/photo"; // Directorio destino ajustado
        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        
        // Verificar si el archivo es una imagen real o falsa
        $check = getimagesize($_FILES["pic"]["tmp_name"]);
        if($check !== false) {
           
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }
        
        // Verificar si el archivo ya existe
        if (file_exists($target_file)) {
            echo "Lo siento, el archivo ya existe.";
            $uploadOk = 0;
        }
        
        // Permitir ciertos formatos de archivo
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Lo siento, solo se permiten archivos jpg, jpeg, PNG y GIF.";
            $uploadOk = 0;
        } else {
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                include('../config.php');
                $sql = "INSERT INTO doctor (name, address, contact, email, expertise, userid, fee, password, pic)
                    VALUES ('" . $_POST["name"] . "','" . $_POST["address"] . "','" . $_POST["contact"] . "','" . $_POST["email"] . "', '" . $_POST["expertise"] . "','" . $_POST["userid"] . "','" . $_POST["fee"] . "','" . $_POST["password"] . "','" . basename($_FILES["pic"]["name"]) ."')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Nuevo doctor agregado exitosamente!');</script>";
                } else {
                    echo "<script>alert('Hubo un error');</script>";
                }
                
                $conn->close();
            } else {
                echo "<script>alert('Lo siento, hubo un error al subir tu archivo.');</script>";
            }
        }
    // }
?>
<!-- Validación e inserción Fin-->
