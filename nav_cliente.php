<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mi pequeñApp</title>
</head>
<body>


    <nav id="desplegar_menu">
        <ul class="sidebar">
            <li> <a href="salir.php">Salir</a> </li>
            <li> <a href="listar_cliente.php">Consulta</a> </li>

        </ul>
    </nav>
</body>
</html>
<script>

const boton = document.getElementById('desplegar_menu');
const sidebar = document.querySelector(".sidebar");

boton.addEventListener("click", function() {
 
 sidebar.classList.toggle("active");
 
})

</script>