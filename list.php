<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Listado de Productos</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
function deleteProducto(cod_zapatilla){
	

	if(window.confirm("Desea ud. eliminar realmente el id="+cod_zapatilla)){
		document.location.href="delete.php?q="+cod_zapatilla;
}
}
function editProducto(cod_zapatilla){
	

	if(window.confirm("Desea ud. modificar realmente el id="+cod_zapatilla)){
		document.location.href="edit.php?q="+cod_zapatilla;
}
}
		

</script>
</head>
<h1 style="margin:20px 0px" class="text-center">Listado de Productos</h1>
<body>

	<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>
				<th>#</th>
				<th>Modelo</th>
				<th>Marca</th>
				<th>Precio</th>
				<th>Color</th>
				<th>Eliminar</th>
				<th>Actualizar</th>

			</tr>
		</thead>
		<tbody>
		 <?php
header('Content-type: text/html;charset=UTF-8');
include_once "includes/bdd.php";
$con=openCon('database_productos.ini');
$con->set_charset("utf8");
$sql="SELECT 
z.modelo as modelo, 
z.precio as precio, 
z.id_zapatilla as id, 
c.descripcion as color,
m.descripcion as marca
FROM zapatillas z 
INNER JOIN color c 
on c.id_color=z.id_color
INNER join marcas m 
on z.id_marca=m.id_marca" ;

$result=$con->query($sql);

while ($row=$result->fetch_assoc()){
    
?>
		
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['marca'] ?> </td>
				<td><?php echo $row['modelo'] ?></td>
				<td>$<?php echo $row['precio'] ?></td>
				<td><?php echo $row['color'] ?></td>
				<td><a href="#" onclick="deleteProducto(<?php echo $row['id'] ?>)">Eliminar Producto</a></td>
				<td><a href="#" onclick="editProducto(<?php echo $row['id'] ?>)">Editar Producto</a></td>

			</tr>
		
		
 <?php 
}
  ?>
</tbody>

	</table>
</body>
</html>