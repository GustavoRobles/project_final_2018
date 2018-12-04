<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Demo Galería</title>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quattrocento" rel="stylesheet">
<link href="css/arrow.css" rel="stylesheet">
<style>
* {
	margin: 0;
	padding: 0;
}
body {
	font-family: 'Quattrocento', serif;
	font-size: 13px;
	font-weight: 300;
	background-color: #E5E5E5;
}
header h1 {
	font-family: 'Oswald', sans-serif;
	font-size: 36px;
	text-align: center;
	font-weight: 400;
	margin-top: 15px;
}
header hr, footer hr {
	width: 100%;
	margin: 15px auto 30px auto;
}
.gallery {
	display: flex;
	flex-wrap: wrap;
}
.gallery li {
	list-style: none;
	width: calc(100% / 3); /* 33.33% */
	padding: 10px;
	box-sizing: border-box;
	display: flex;
}
.gallery li .box {
	padding: 6px 6px 30px 6px;
	background-color: #fff;
	overflow: hidden;
}
.gallery li img {
	display: block;
	width: 100%;
	margin-bottom: 6px;
	height: auto;
	max-width: 100%; 
}
.gallery li h3 {
	margin-bottom: 6px;
	text-align: center;
	font-size: 15px;
	font-weight: bold;
	line-height: 100%;
	text-transform: uppercase;
	color: #000;
}
.gallery li p {
	text-align: center;
	font-size: 24px;
	font-weight: bold;
}
.gallery li time {
	display: block;
	font-weight: 400;
	text-align: center;
}
#footer-text {
	text-align: center;
	font-weight: bold;
	margin-bottom: 30px;
}

@media screen and (max-width: 480px) {
.gallery {
	display: flex;
	flex-direction: column;
	margin: 1rem; 
}
.gallery li {
	width: 100%;
}

footer hr {
	display: none;
}
	
#toTop>img {
	display: none;
}
}

	
@media (min-width: 481px) and (max-width: 960px) {
.gallery {
	display: flex;
	flex-flow: row wrap;
}
.gallery li {
	width: calc(100% / 2);
}
}

@media (min-width: 961px) {
.gallery {
	display: flex;
	flex-flow: row wrap;
	width: 100%;
	max-width: 1600px;
	margin: 0px auto
}
}
	.ctr{
	font-family: 'Oswald', sans-serif;
	font-size: 36px;
	text-align: center;
	font-weight: 400;
	margin-top: 15px;
	text-transform: uppercase;
}
	
	
</style>
<script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<header>
  <h1>GALERÍA DE PRODUCTOS</h1>
  <hr>
</header>
<section id="main">
  <!-- Contenido principal de la galeria -->
  <ul class="gallery">
   <?php
header('Content-type: text/html;charset=UTF-8');
include_once "includes/bdd.php";
$con=openCon('database_productos.ini');
$con->set_charset("utf8");
$sql="SELECT 
z.modelo as modelo, 
z.precio as precio, 
z.imagen as imagen, 
z.observacion as observacion, 
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
  <li>
  <div class="box">
  <figure>
  <img alt="" src="<?php echo $row['imagen']?>">
  <figcaption>
  <h1 class="ctr"><?php echo $row['marca']." ".$row['modelo']?></h1>
  <h1 class="ctr" style="color:red;">$<?php echo $row['precio']?></h1>
  <br>
  <h3>Color: <?php echo $row['color']?></h3>
  <h3><?php echo $row['observacion']?></h3></figcaption>
  </figure>
  
  </div>
  </li>
  <?php 
}
  ?>
  </ul>
</section>
<footer>
  <hr>
  <h3 id="footer-text">Copyright 2018 | Todos los derechos reservados </h3>
  <p id="footer-text"><a href="form_login.html">Login</a></p>
  
</footer>
<div class="arrow"> <a id="toTop" href="#"> <img src="images/backToTop.png" alt="Back to top bottom image"/> <img src="images/backToTop.png" class="top" alt="Back to top top image"/> </a> </div>
<!-- Scoll to the top with jQuery by Adrian Tomic: http://www.adriantomic.se/development/scroll-to-the-top-with-jquery/ --> 
<script>
     $(document).ready(
      function(){
     
      // When the user clicks the toTop button, we want the page to scroll to the top.
      $("#toTop").click(function(){
     
      // Disable the default behaviour when a user clicks an empty anchor link.
      // (The page jumps to the top instead of // animating)
      event.preventDefault();
     
      // Animate the scrolling motion.
      $("html, body").animate({
      scrollTop:0
      },"slow");
     
      }); 
     
     });
</script>
</body>
</html>
