<?php require('conn_db_pdo.php'); 

$nombre_usuario = $_POST['usuario'];

$qr=DB::consulta("SELECT id,pregunta_seguridad, respuesta FROM `usuarios` WHERE nombre_usuario =:pdonombre",array('pdonombre'=>$nombre_usuario));
foreach ($qr as $cnv) {
	# code...
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Recuperar contraseña</title>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <style type="text/css">
    	body{
    		text-align: center;
            

    	}
    </style>
</head>
<body>
<div class="jumbotron">
<h1>Pregunta de seguridad</h1>
 <div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
  	<label><?=$cnv['pregunta_seguridad']?></label>
  	</br>
   	<input type="text" name="" id="respuesta">
  	</br>
  	</br>
  	<script type="text/javascript">
  	function comparacion()
  	{
  		var respuesta = document.getElementById('respuesta').value;
  		var responder = document.getElementById('responder').value;
  		if(respuesta==responder)
  		{
  			window.location="http://localhost/programacionWeb/actualizaPassword.php?id=<?=$cnv['id']?>";
  		}
  		else
  		{
  			alert('Palabra incorrecta');
  		}	
  		

  	}


  	</script>
    <input type="text" name="" id="responder" style="display: none;" value="<?=$cnv['respuesta']?>">
  	<input type="button" name="" onclick="comparacion();" value="Cambiar" class="btn btn-lg btn-primary">
    </div>	
  </div>
</div>
<?php }?>
</body>
</html>

	
</script>