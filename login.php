<?php

$user=$_POST['username'];
$contra=$_POST['password'];

include_once 'includes/bdd.php';
$con=openCon('databases.ini');
$con->set_charset("utf8");
$contra=MD5($contra);
$sql="SELECT COUNT(*) as contar FROM usuarios WHERE (username='$user' or email='$user') and password='$contra'";

$result=$con->query($sql);

$row = $result->fetch_assoc();//*devuelve arraye asociativo,seria el count//*

if($row['contar']==0)
{
    echo "<h1 style='text-aling:center'>Ingreso invalido al sistema</h1> ";
    echo "<br>";
    echo "<a style='text-aling:center' href='form_login.html'>Volver a Intertarlo</a>";
}

else {

  session_start();
  $_SESSION['username']=$user;
  $_SESSION['time']=date('H:i:s');
  $_SESSION['logueado']=true;
  
  header("location:welcome.php");
}
?>

