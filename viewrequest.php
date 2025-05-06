<?php include('header.php'); ?> <br>

<!-- Sección de registro de donantes -->
<div class="donor_reg" style="background-color: #7faf81;"> <br>
    
    <form method="post" enctype="multipart/form-data"> <br>
       <table cellpadding="20" cellspacing="20" width="1000px" height=""  style="margin:auto;background-color:#f9f9f9;color:#151314;" >

            <tr><td colspan="9" align="center"><h1 class="text-center"><u>Quién ha solicitado sangre</u></h1></td></tr>
             
            <tr style="background-color:bisque" align="center" class="bold">            
                <th align="center">Nombre</th>
                <td align="center">Género</td>
                <th align="center">Edad</th>
                <td align="center">Teléfono</td>
                <th align="center">Grupo Sanguíneo</th>
                <td align="center">Correo Electrónico</td>
                <th align="center">Hasta la Fecha Requerida</th>
                <td align="center">Detalles</td>
            </tr>
                               
        <?php

        $cn = mysqli_connect("localhost","root","","sistema_medico_db");
        $s = "SELECT * FROM requestes";
        $result = mysqli_query($cn, $s);
        $r = mysqli_num_rows($result);
        
        while($data = mysqli_fetch_array($result)) {
            echo "<tr>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    <td>$data[3]</td>
                    <td>$data[4]</td>
                    <td>$data[5]</td>
                    <td>$data[6]</td>
                    <td>$data[7]</td>
                    <td>$data[8]</td>
                </tr>";
        }
        
        mysqli_close($cn);
        ?>

        </table> <br>
    </form>
</div>

<?php include('footer.php'); ?>

</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
