<?php
    include "conectado.php";
    if($id=$_GET['id_municipios']){
        $sql="DELETE FROM municipios where id_municipios=$id";
        $resul=mysqli_query($conexion, $sql);
        if($resul===true){
            header("location:administrador.php");
        }
?>
<?php } else if ($id=$_GET['id_edificios']){?>
<?php
    include "conectado.php";
        $sql1="DELETE FROM edificios where id_edificios=$id";
        $resul=mysqli_query($conexion, $sql1);
        if($resul===true){
            header("location:administrador.php");
        }
}
?>