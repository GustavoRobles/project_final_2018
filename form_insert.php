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
form{
    max-width: 600px;
    width: 100%;
    padding: 15px 35px 45px 35px;
    margin: 20px auto;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.1);
}
h3{
    margin-top:15px;
}

</style>

</head>
<body>
	<div id="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">INGRESO DE PRODUCTOS</h3>


			</div>
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8"
					action="save_productos.php" enctype="multipart/form-data"
					method="post">
					<div class="form-group">
						<br> <label class="control-label" for="modelo">MODELO</label> <input
							id="modelo" name="modelo" placeholder="MODELO"
							class="form-control" required="" type="text">
					</div>
					<div class="form-group">
						<br> <label class="control-label" for="precio">PRECIO</label> <input
							id="precio" name="precio" placeholder="PRECIO"
							class="form-control" required="" type="text">
					</div>
					<div class="form-group">
						<br> <label class="control-label" for="observacion">OBSERVACION</label> 
						<br>
						<textarea id="observacion" name="observacion" rows="3"  placeholder="Observacion"
							class="form-control"></textarea>
					</div>
					<div class="form-group">
					<br>
					<label class="control-label" for="marca">MARCA</label>
					<select id="marca" name="marca" class="form-control" >
					<option value="" disabled selected>--Seleccione una marca--</option>
					<?php
					header('Content-type: text/html;charset=UTF-8');
					include_once "includes/bdd.php";
					$con=openCon('database_productos.ini');
					$con->set_charset("utf8");
					$sql="SELECT id_marca,descripcion from marcas order by descripcion;";
					$result=$con->query($sql);
					while($row=$result->fetch_assoc()){
					   
					 echo '<option value="'.$row['id_marca'].'">'.$row['descripcion'].'</option>';
				 	    
					}

					
					?>
					</select>
					</div>
						<div class="form-group">
					<br>
					<label class="control-label" for="color">COLOR</label>
					<select id="color" name="color" class="form-control" >
					<option value="" disabled selected>--Seleccione un color--</option>
					<?php
					header('Content-type: text/html;charset=UTF-8');
					include_once "includes/bdd.php";
					$con=openCon('database_productos.ini');
					$con->set_charset("utf8");
					$sql="SELECT id_color,descripcion from color order by descripcion;";
					$result=$con->query($sql);
					while($row=$result->fetch_assoc()){
					   
					 echo '<option value="'.$row['id_color'].'">'.$row['descripcion'].'</option>';
				 	    
					}

					
					?>
					</select>
					 </div>
					<div
					class= "form-group">
					<br>
					<label for="file">SELECIONE IMAGEN A SUBIR</label>
					<input type="file" id= "imagen" name="imagen" class="form-control" size="30"
					/>
				    </div>
					
					<div class= "text-center">
					<input type="submit" class="btn btn-success" value="agregar producto"/>
					</div>
					</form>
					</div>
					
					
					</div>
		</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


</body>
</html>