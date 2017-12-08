<?php 
$idSecreto = $_GET["id"];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Actualizar contraseña</title>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <style type="text/css">
    	body{
    		text-align: center;
    		position: relative;
    		top: 100px; 

    	}
    </style>

</head>
<script type="text/javascript">
	function validarPasword()
	{
		var password1= document.getElementById('pss1').value;
		var password2= document.getElementById('pss2').value;

		if(password1 != password2)
		{
			document.write("");
			window.location="http://localhost/programacionWeb/actualizaPassword.html";
			alert('Las contraseñas no coinciden');
			
		}
	}
</script>
<body>
<div class="container">
	
	<h1>Ingrese su nueva contraseña</h1>
        <form action="actualizacion.php" method="post">
         <div class="row">
           <div class="col-md-3"></div>
            <div class="col-md-6">
               <input type="password" id="pss1"  name= "nombre_usuario" class="form-control" placeholder="Nueva Contraseña" required autofocus>
               </br>
               <input type="password" id="pss2" name="password" class="form-control" placeholder="repetir contraseña" required>
               <input type="text" name="id" value="<?=$idSecreto?>" style="display: none;">
            </div>
        </div>
</br>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
      	      
      	      <button onclick="validarPasword();" class="btn btn-lg btn-primary">Recuperar</button>
        </form>    

    	</div>

    	
    
    
</div>


</body>
</html>