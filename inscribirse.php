<?php
    include "conectado.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mi pequeñApp</title>
</head>
<body>
<div class="contenedor2">

    <div class="titulo-login"><h1>Inscribirse o</h1></div>
    <div class="contenedor-login">
        <div>de ya tener cuenta </div> <br> 
        <div><a href="ingresar.php">Ingresa</a></div>
    </div>
</div>

    <form action="inscribirse.php" method="post">

        <input required type="text" name="nombre" placeholder="Ingresa tu nombre" id="">
        <input required type="email" name="email" placeholder="Ingresa tu email" id="">
        <input required type="password" name="password" placeholder="Contraseña" id="">
        <input required type="password" name="confirm_password" placeholder="Confirma tu contraseña" id="">
        <input type="submit" value="Ingresar">

    </form>



<?php 

$nombre=$_POST["nombre"]??null;
$email= $_POST["email"]?? null;
$password= $_POST["password"]?? null;    



if($email!=null && $password!=null){


    $sql1="INSERT INTO usuarios(nombre, correo, password) VALUES ('$nombre','$email','$password')";

    $newUser = mysqli_query($conexion, $sql1);
    
    if($newUser){
        echo "¡BIEN HECHO! Te inscribiste.";

    }else{
        echo "No puede ser :( algo salio mal";
    }
}
?>
    
</body>
</html>
