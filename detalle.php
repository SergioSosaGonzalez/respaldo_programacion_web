<?php require('conn_db_pdo.php');
      require('EstaLogueado.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <style type="text/css">
    	body{
    		text-align: right;
    	}
    	.perfil {
    		border-radius: 100%;
    		width: 200px;
    		height: 200px;
    	}
    	h1{
    		text-align: center;
    	}
    	.formulario{
    		text-align: center;
    		position: relative;
    		top: -100px;
    	}
      #nombreUsuario{
        color: #FFF;
      }
      nav a:hover{
        font-size: 25px;
        color: white !important;
        transition: font-size 0.5s;

      }
    </style>
</head>
<body>
<div class="container" >
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://localhost/programacionWeb/formulario.php">Formulario</a>
          <a class="navbar-brand" href="http://localhost/programacionWeb/tabla.php">Usuarios</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="SalirLogin.php">
            <div class="form-group">
              <label id="nombreUsuario"><?=$_SESSION['dev'];?></label>
            </div>
            <button type="submit" class="btn btn-success">Cerrar sesion</button>
          </form>
        </div>
      </div>
</nav>
</br>
</br>
</br>
<?php 
$id=$_GET["id"];
if($estado)
{
$qr=DB::consulta("SELECT * FROM datospersonales INNER JOIN datoscontato WHERE datospersonales.Id=:pdoid AND datoscontato.id =:pdoid",Array('pdoid'=>$id));
foreach ($qr as $cnv) {
?>
    <img src=<?=$cnv['foto']?> class="perfil">
    <h1 class="formulario"><?=$cnv['nombre']?></h1>
    <div class="formulario">
    	<label>Fecha de nacimiento: </label>
    	<p><?=$cnv['fecha_nacimiento']?></p>
    </div>
    <div class="formulario">
    	<label>Edad: </label>
    	<p><?=$cnv['edad']?></p>
    </div>
    <div class="formulario">
    	<label>Datos personales: </label>
    </div>

   <div class="formulario">
    <div class="row">
     <div class="col-md-3">
     </div>
      <div class="col-md-6">
      	<div class="jumbotron">
      	   <label> Dirección: </label>
      	   <span><?=$cnv['direccion']?></span>
      	   <label> #: </label>
      	   <span><?=$cnv['numero_casa']?></span>
      	   </br>
      	   <label>Telefono: </label>
      	   <span><?=$cnv['telefono']?></span>
      	   <label>Correo: </label>
      	   <span><?=$cnv['correo']?></span>
      	   </br>
      	   <label>Estado: </label>
      	   <span><?=$cnv['estado']?></span>
      	   <label>Municipio:</label>
      	   <span><?=$cnv['municipio']?></span>
    	</div>
      </div>
    </div>	
    </div>
    <?php }
  }else{
    ?>
</div>
</body>
<?php 
header("Location: http://localhost/programacionWeb/socialNetworkLogin.php");
}
?>
</html>