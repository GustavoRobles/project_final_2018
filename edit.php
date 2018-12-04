<?php
if (isset($_GET['q'])) {

    $id = $_GET['q'];
    header('Content-type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con = openCon('database_productos.ini');
    $con->set_charset("utf8");
    $sql = "SELECT
z.id_zapatilla as id,
z.modelo as modelo,
z.precio as precio,
z.observacion as observacion,
c.descripcion as color,
m.descripcion as marca,
m.id_marca as id_marca,
c.id_color as id_color
FROM zapatillas z INNER JOIN color c on 
z.id_color=c.id_color
INNER JOIN marcas m on 
z.id_marca=m.id_marca
WHERE z.id_zapatilla=".$id;

    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Agregar Productos</title>

<link href="https://fonts.googleapis.com/css?family=Lato"
	rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
form {
	max-width: 600px;
	width: 100%;
	padding: 15px 35px 45px 35px;
	margin: 20px auto;
	background-color: #fff;
	border: 1px solid rgba(0, 0, 0, 0.1);
}

h3 {
	margin-top: 15px;
}
</style>

</head>
<body>
	<div id="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">EDITAR DE PRODUCTOS</h3>


			</div>
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8"
					action="update_producto.php" enctype="multipart/form-data"
					method="post">
					<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $row['id']?>">
					
					</div>
					
					<div class="form-group">
						<br> <label class="control-label" for="modelo">MODELO</label> <input
							id="modelo" name="modelo" value="<?php echo $row['modelo']?>"
            class="form-control" required="" type="text">
					</div>
					<div class="form-group">
						<br> <label class="control-label" for="precio">PRECIO</label> <input
							id="precio" name="precio" 
							class="form-control" required="" type="text" value="<?php echo $row['precio']?>">
					</div>
					<div class="form-group">
						<br> <label class="control-label" for="observacion" >OBSERVACION</label>
						<br>
						<textarea id="observacion" name="observacion" rows="3"
							 class="form-control" ><?php echo $row['observacion']?></textarea>
					</div>
					<div class="form-group">
						<br> <label class="control-label" for="marca">MARCA</label> <select
							id="marca" name="marca" class="form-control">
							
                    <?php
                    header('Content-type: text/html;charset=UTF-8');
                    include_once "includes/bdd.php";
                    $con = openCon('database_productos.ini');
                    $con->set_charset("utf8");
                    $sql = "SELECT id_marca,descripcion from marcas order by descripcion;";
                    $result = $con->query($sql);
                    echo '<option value="'. $row['id_marca']. '">'. $row['marca'] . '</option>';
                    while ($row2 = $result->fetch_assoc()) {

                        echo '<option value="' . $row2['id_marca'] . '">' . $row2['descripcion'] . '</option>';
                    }

                    ?>
					</select>
					</div>
					<div class="form-group">
						<br> <label class="control-label" for="color">COLOR</label> <select
							id="color" name="color" class="form-control">
							
					<?php
    header('Content-type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con = openCon('database_productos.ini');
    $con->set_charset("utf8");
    $sql = "SELECT id_color,descripcion from color order by descripcion;";
    $result = $con->query($sql);
     echo '<option value="'. $row['id_color']. '">'. $row['color'] . '</option>';
    while ($row2 = $result->fetch_assoc()) {

        echo '<option value="' . $row2['id_color'] . '">' . $row2['descripcion'] . '</option>';
    }

    ?>
					</select>
					</div>
				
					<div class="text-center">
						<input type="submit" class="btn btn-success"
							value="Guardar producto" />
					</div>
			</form>
			</div>


		</div>
	</div>
	
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


</body>
</html>