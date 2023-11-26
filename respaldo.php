<?php

    include("conectado.php");

    $db_host='localhost';
    $db_name='edificioscaracas';
    $db_user='root';
    $db_pass='';


    $archivo = "C:/xampp/htdocs/pequeñaapp/respaldo" . "_" . date("Y-m-d") . ".sql";

    $sql = "SELECT * INTO OUTFILE '$archivo' FROM $db_name";
?>