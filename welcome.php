<?php

session_start();
if($_SESSION['logueado']== true){
  
echo "<br>";
 echo 'Bienvenido, '.$_SESSION['username'];
echo '<br>';
echo 'Horario de conexion:'.$_SESSION['time'];
echo "<br>";
echo '<a href="logout.php">logout</a>';
echo '<br>';
echo "<h1 style='text-align:center'> Menu de Opciones </h1>";
echo '<h3 style="text-align:center"><a href="form_insert.php">INGRESAR PRODUCTO NUEVO</a></h3>';
}
else
{
    header("location: form_login.html");
    exit();
}


?>