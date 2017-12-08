<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Contraseña olvidada</title>
    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
 <style type="text/css">
 	body{
 		text-align: center;
 		background-color: yellow;
 	}
 	div{
 		position: relative;
 		top: 100px;
 	}

 </style>
</head>
<body>
<h1>Buscar usuario por nombre</h1>
<div class="container">
   <form method="post" action="recuperar.php">
      <div class="jumbotron">
   	   <input type="text" name="usuario" placeholder="Usuario " required>
   	   </br>
   	   </br>
   	   <input type="submit" name="" value="Encontrar" class="btn btn-lg btn-primary">
   	  </div> 
   </form>
</div>


</body>
</html>