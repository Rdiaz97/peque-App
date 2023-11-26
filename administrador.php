<?php 
        include "conectado.php";
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

        include "nav.php";
        
    ?>

    <div class="contenedor3">
        <div>
            <h1>Municipios</h1>
            <?php
                while($filas=mysqli_fetch_assoc($res)){?>
            <form action="administrador.php" method="post">

                <label>MUNICIPIO</label>
                <input type="text" name="municipios" value="<?php echo $filas["municipios"];?>">

                <label> Agregador por: </label><br>
        <select name= "usuarios">
        <?php while ($filas3 = mysqli_fetch_assoc($res2) ) {?>
            <option selected value="<?php echo $filas3["id_usuarios"] ?>"><?php echo $filas3['nombre'];}?></option>
            <?php
        $sql2="SELECT * FROM usuarios";
        $res2=mysqli_query($conexion,$sql2);
         ?>
        </select><br>

                <?php echo "<a  href='eliminar.php?id_municipios=".$filas['id_municipios']."'>Eliminar</a>";?> 

                <input type="submit" value="editar">
            </form>
        <?php } ?>


        </div>

        <div>
        <h1>Edificios</h1>



                <?php
                    while ($filas1 = mysqli_fetch_assoc($res1) ) {?>
                    <form action="administrador.php" method="post">
                        <label>ID</label>
                        <input type="text" name="id_edificios" value="<?php echo $filas1["id_edificios"];?>">
                        <label>EDIFICIOS</label>
                        <input type="text" name="edificios" value="<?php echo $filas1["edificios"];?>">
                        <label>QUIEN LO AGREGO</label>
                        <select name= "usuario1">
        <?php while ($filas3 = mysqli_fetch_assoc($res2) ) {?>
            <option selected value="<?php echo $filas3["id_usuarios"] ?>"><?php echo $filas3['nombre'];}?></option>
            <?php
        $sql2="SELECT * FROM usuarios";
        $res2=mysqli_query($conexion,$sql2);
         ?>
        </select><br>
                        
                        <?php echo "<a  href='eliminar.php?id_edificios=".$filas1['id_edificios']."'>Eliminar</a>";?> 

                        <input type="submit" value="editar">
                    </form>
                <?php
                }
                ?>


        </div>
    </div>

</body>
</html>
   


<?php


$id=$_POST["id_municipios"]?? null;
$municipio=$_POST["municipios"]?? null;
$usuario=$_POST["usuarios"]?? null;

if($id=$_POST['id_municipios']?? null){
    $sql3="UPDATE municipios SET municipios= '$municipio', id_usuarios= '$usuario' where id_municipios=$id";
    mysqli_query($conexion, $sql3);
}

$id1=$_POST["id_edificios"]?? null;
$edificios=$_POST["edificios"]?? null;
$usuario1=$_POST["usuario1"]?? null;



if($id1=$_POST['id_edificios']?? null){
    $sql4="UPDATE edificios SET edificios= '$edificios', id_usuarios= '$usuario1' where id_edificios=$id1";
    mysqli_query($conexion, $sql4);
}


?>
