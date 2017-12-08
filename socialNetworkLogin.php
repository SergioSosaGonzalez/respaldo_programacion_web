<?php require('conn_db_pdo.php'); 
      require('EstaLogueado.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Inicio de sesión</title>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <style type="text/css">
    body{
    	text-align: center;
    	position: relative;
    	top: 100px;
    }
    	.form-contro{
    		text-align: center;
    		width: 400px;
    	}
    </style>
</head>
<?php 
if($estado)
{
  echo "<script>alert('Sesion iniciada')</script>";
  echo "<script>window.location='http://localhost/programacionWeb/tabla.php'</script>";
}else
{
?>
<body>
<div class="container">
	
	<h2 class="form-signin-heading">Usuario y contraseña</h2>
        <form action="validacion.php" method="post">
         <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6">
               <input type="text" id="nom"  name= "nombre_usuario" class="form-contro" placeholder="Nombre de usuario" required autofocus>
               <input type="password" id="inputPassword" name="password" class="form-contro" placeholder="Contraseña" required>
            </div>
        </div>
</br>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
      	      <input type="submit" name="nombreBoton" value="Entrar" class="btn btn-lg btn-primary">
      	    </div>
        </form>    

    	</div>
</br>
    	<div class="row">
    	   <div class="col-md-3"></div>
    	   <div class="col-md-6">
    	   	<a href="http://localhost/programacionWeb/olvidarContrasena.php">¿Has olvidado tu contraseña?</a>
    	   </div>
    		
    	</div>
</div>
<?php 
 }
?>
</body>
</html>