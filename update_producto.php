<?php
if (isset($_POST['id'])) {
    $id_zapa = $_POST['id'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $obs = $_POST['observacion'];
    $marca = $_POST['marca'];
    $color = $_POST['color'];
    header('Content-type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con = openCon('database_productos.ini');
    $con->set_charset("utf8");
    $sql ="UPDATE
zapatillas set
modelo='$modelo',
precio='$precio',
observacion='$obs',
id_color= '$color',
id_marca='$marca'
WHERE
id_zapatilla=".$id_zapa;
    $con->query($sql);
    header("location:list.php");
}

?>
