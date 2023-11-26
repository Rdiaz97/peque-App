<?php
    include "conectado.php";

    $sql="SELECT * FROM usuarios";
    $res= mysqli_query($conexion,$sql);

    $sql1="SELECT * FROM municipios";
    $res1= mysqli_query($conexion,$sql1);

    include "nav.php";
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


<div class="contenedor3">
        
    <div>
        <form method="get">

            <label>Municipio: </label><br>
            <input type="text" name="municipio"><br>

            <label> Agregador por: </label><br>
        <select name= "usuario">
        <?php while ($filas = mysqli_fetch_assoc($res) ) {?>
            <option selected><?php echo $filas['nombre'];}?></option>
        </select><br>
        
            <input type="submit" value="agregar">
        </form>
    </div>
<?php
    $municipio = $_GET["municipio"]?? null;

    if(@$_GET["usuario"] == 'Hector'){
        @$usuario =3;
    }else if(@$_GET["usuario"] == 'Rafael'){
        @$usuario =1;
    }else if(@$_GET["usuario"] == 'Juana'){
        @$usuario =2;
    }

    if($municipio!=null && $usuario!=null){

        $sql4="INSERT INTO municipios (municipios, id_usuarios) VALUES ('$municipio', '$usuario')";

        mysqli_query($conexion, $sql4);

        if($municipio=1){
            header("location:listar.php");
        }
    }

    $res3= mysqli_query($conexion,$sql);


?>
    <div> 
        <form method="get">

            <label for="edificio">Edificios: </label><br>
            <input type="text" name="edificio"><br>

            <label> En el municipio: </label><br>
        <select name= "municipio1">
        <?php while ($filas1 = mysqli_fetch_assoc($res1) ) {?>
            <option selected value="<?php echo $filas1["id_municipios"] ?>"><?php echo $filas1['municipios'];}?></option>
        </select><br>

        <label> Agregador por: </label><br>
        <select name= "usuario1">
        <?php while ($filas3 = mysqli_fetch_assoc($res3) ) {?>
            <option selected value="<?php echo $filas3["id_usuarios"] ?>"><?php echo $filas3['nombre'];}?></option>
        </select><br>
        
            <input type="submit" value="agregar">
        </form>
    </div>
<?php

    $edificio = $_GET["edificio"]?? null;
    $usuario2=$_GET["usuario1"]  ??null;   
    $municipio2=$_GET["municipio1"]??null; 


    if($edificio!=null && $usuario2!=null && $municipio2!=null){


        $sql5="INSERT INTO edificios (id_municipios, id_usuarios, edificios) VALUES ('$municipio2', '$usuario2','$edificio')";

        mysqli_query($conexion, $sql5);

        if($edificio=1){
            header("location:listar.php");
        }
    }
?>
</div>
    
</body>
</html>


