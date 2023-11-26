<?php 
        include "conectado.php";
        session_start();
        error_reporting (0);
        $varsession= $_SESSION['email'];
        if($varsession== null || $varsession= ''){
            header('location:index.php');
            die();
        }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>mipequeñApp</title>
</head>
<body>

    <?php
        $sql="SELECT * FROM municipios";
        $res= mysqli_query($conexion,$sql);

        $sql1="SELECT * FROM edificios";
        $res1=mysqli_query($conexion,$sql1);

        $sql2="SELECT * FROM usuarios";
        $res2=mysqli_query($conexion,$sql2); 

        include "nav_cliente.php";
        
    ?>

    <div class="contenedor3">
    <div>
            <table>
                <thead>
                    <tr><th>MUNICIPIOS</th></tr>

                 </thead>

                <tbody>
                <?php
                    while ($filas = mysqli_fetch_assoc($res) ) {?>
                <tr>
                    <!-- <td><?php echo $filas["municipios"]?></td> -->
                    <td><?php echo $filas["municipios"]?></td>

                    <!-- <td><?php echo "<a class='aca' href='editar.php?id_inventario=".$filas['id_municipios']."'>Editar</a>";?> <?php echo "<a class='aca' href='eliminar.php?id_inventario=".$filas['id_municipios']."'>Eliminar</a>";?> </td> -->
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            </div>

            <div>

        <table>
            <thead>
                <tr><th>EDIFICIOS</th></tr>
            </thead>
            <tbody>
                <?php
                    while ($filas1 = mysqli_fetch_assoc($res1) ) {?>
                <tr>
                    <!-- <td><?php echo $filas1["edificios"]?></td> -->
                    <td><?php echo $filas1["edificios"]?></td>

                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>

        <div>

<table>
    <thead>
        <tr><th>USUARIOS</th></tr>
    </thead>
    <tbody>
        <?php
            while ($filas2 = mysqli_fetch_assoc($res2) ) {?>
        <tr>
            <!-- <td><?php echo $filas2["id"]?></td> -->
            <td><?php echo $filas2["nombre"]?></td>

        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
    </div>

</body>
</html>
   