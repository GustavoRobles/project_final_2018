<?php
if(isset($_GET['q'])){
    

$id = $_GET['q'];

header('Content-type: text/html;charset=UTF-8');
include_once "includes/bdd.php";
$con=openCon('database_productos.ini');
$con->set_charset("utf8");
$sql="DELETE from zapatillas WHERE id_zapatilla=".$id;
$con->query($sql);
header("location:list.php");
}