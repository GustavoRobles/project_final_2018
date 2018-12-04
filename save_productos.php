<?php
session_start();
if ($_SESSION['logueado']==true)
{
    include_once 'includes/upload_image.php';
   $modelo= $_POST['modelo'];
   $precio= $_POST['precio'];
    $obs=$_POST['observacion'];
    $marca=$_POST['marca'];
    $color=$_POST['color'];
    /*$img=$_POST['IMAGEN'];*/
    header('Content-type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con=openCon('database_productos.ini');
    $con->set_charset("utf8");
    
    
    $sql="insert into zapatillas(modelo,precio,observacion,id_marca,id_color,imagen)
    VALUES(?,?,?,?,?,?)";
    $ruta_img=$directorio.$nombre_img;
    $stmt=$con->prepare($sql);
    $stmt->bind_param ("sdsiis",$modelo,$precio,$obs,$marca,$color,$ruta_img);
    if ($stmt->execute()){
   
    
?>
<script >
alert('producto ingresado');
window.location="form_insert.php";
</script>

<?php 
    }

    }
  
?>   