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

        $sql3="SELECT * FROM usuarios";
        $res3=mysqli_query($conexion,$sql3);

        include "nav.php";
        
    ?>

<div class="contenedor3">
    <div>
        <h1>MUNICIPIOS</h1>
<?php
while ($filas = mysqli_fetch_assoc($res) ) {
?>
        <table>
            <thead>
                <tr>
                    <td><?php echo $filas["municipios"]?></td>
                </tr>
            </thead>
            <tbody>
<?php
$id=$filas['id_municipios'];

$sql_id="SELECT * FROM `edificios` WHERE `id_municipios` = $id";
$filas1 = mysqli_query($conexion,$sql_id);
while($row=mysqli_fetch_assoc($filas1)) {

?>
                <tr>
                    <td>Edificio: <?php echo $row['edificios']?></td>
                </tr>
<?php
}
?>
            </tbody>
        </table>
<?php
}
?>
    </div>

    <div>
        <h1>USUARIOS</h1>
<?php
while ($filas2 = mysqli_fetch_assoc($res2) ) {
?>
        <table>
            <thead>
                <tr>
                    <td><?php echo $filas2["nombre"]?></td>
                </tr>
            </thead>
            <tbody>
<?php
$row1=$filas2['id_usuarios'];
$aver="SELECT * FROM `edificios` WHERE `id_usuarios` = $row1";
$sql_usuarios = mysqli_query($conexion,$aver);
while($row=mysqli_fetch_assoc($sql_usuarios)) {
?>
                <tr>
                    <td>Edificio: <?php echo $row['edificios']?></td>
                </tr>
<?php
}
?>
            </tbody>
        </table>
<?php
}
?>
    </div>

    <div>
        <h1>USUARIOS</h1>
<?php
while ($filas3 = mysqli_fetch_assoc($res3) ) {
?>
        <table>
            <thead>
                <tr>
                    <td><?php echo $filas3["nombre"]?></td>
                </tr>
            </thead>
            <tbody>
<?php
$id_municipios=$filas3['id_usuarios'];
$sql_municipios="SELECT * FROM `municipios` WHERE `id_usuarios` = $id_municipios";
$row2 = mysqli_query($conexion,$sql_municipios);
while($row3=mysqli_fetch_assoc($row2)) {

?>
                <tr>
                    <td>Municipio: <?php echo $row3['municipios']?></td>
                </tr>
<?php
}
?>
            </tbody>
        </table>
<?php
}
?>
    </div>
</div>

</body>
</html>
   