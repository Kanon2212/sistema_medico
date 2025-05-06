<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de gestión médica-médicos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>



<div class="container-fluid">
        <div class="header_top">
            
            
        </div>

   
    <div class="navbar navbar-default nav">
        <nav class="menu">
            <ul>
                <li><a href="../index.php">Inicio</a></li>
            </ul>
        </nav>
    </div>
    






   
    <div class="login" style="background-color:#fff;">
        <h1 class="text-center" style="background-color:#272327;color: #fff;">Panel de Doctor</h1>
            <div class="formstyle" style="padding: 10px;border: 1px solid lightgrey;margin-right: 376px;margin-left: 406px; margin-bottom: 25px;background-color:#f3f3f8;color:#141313;">
                <form action="" method="post" class="text-center">
                    <label>
                        <input type="text" name="userid"  placeholder="Usuario" required>
                    </label><br><br>
                    <label>
                        <input type="password" name="password"  placeholder="Contraseña">
                    </label><br><br>
                    <button name="submit" type="submit" style="margin-left:127px;padding: 5px 25px; border-radius: 4px;">Iniciar sesión</button> <br>

                    


                 
            <?php 
                            $_SESSION['adminstatus']="";

                            include('../config.php');
                            if(isset($_POST["submit"])){

                            $sql= "SELECT * FROM doctor WHERE userid= '" . $_POST["userid"]."' AND password= '" . $_POST["password"]."'";

                            $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                            $_SESSION["userid"]= $_POST["userid"];
                                            
                                            $_SESSION['adminstatus']= "yes";
                                            echo "<script>location.replace('myDetails.php');</script>";
                                               
                                        } else {
                                            echo "<span style='color:red;'>Usuario o contraseña incorrectos</span>";
                                        }
                        $conn->close();        
                    }
                    
            ?>
        


                </form> <br>&nbsp;&nbsp;&nbsp;
                
                <br>

                
        
                
            
        
    </div>
    
    
</div>
    
<?php include('../footer.php'); ?>

    
</div>




<script src="../js/bootstrap.min.js"></script>


 
            



    
</body>
</html>
