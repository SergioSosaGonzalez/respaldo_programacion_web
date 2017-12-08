<?php require('conn_db_pdo.php'); 
      require('EstaLogueado.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar formulario</title>
	  <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <script src="js/ckfinder.js"></script>
    <style type="text/css">
      *{
	    margin: 0px;
	    padding: 0px;
      }
      body{
        text-align: center;
      }
      #labelSesion{
        color: #FFF;
      }
      nav a:hover{
        font-size: 25px;
        color: white !important;
        transition: font-size 0.5s;

      }
    </style>
     <script type="text/javascript">
           function openPopup() {
             CKFinder.popup( {
                 chooseFiles: true,
                 onInit: function( finder ) {
                     finder.on( 'files:choose', function( evt ) {
                         var file = evt.data.files.first();
                         document.getElementById( 'img_index' ).value = file.getUrl();
                     } );
                     finder.on( 'file:choose:resizedImage', function( evt ) {
                         document.getElementById( 'img_index' ).value = evt.data.resizedUrl;
                     } );
                 }
             } );
         }
         </script>
</head>
<body>
<?php 

if($estado)
{
?>
<div class="Container">
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://localhost/programacionWeb/formulario.php">Formulario</a>
          <a class="navbar-brand" href="http://localhost/programacionWeb/tabla.php">Usuarios</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="SalirLogin.php">
            <div class="form-group">
              <label id="labelSesion"><?=$_SESSION['dev'];?></label>
            </div>
            <button type="submit" class="btn btn-success">Cerrar sesion</button>
          </form>
</div>
</nav>

  <form method="post" action="actualizar.php">
   <div class="jumbotron">
       <h2>Actualizar formulario</h2>
   	
   </div>

<?php 
$uid = $_GET["id"];

$qr=DB::consulta("SELECT * FROM datospersonales INNER JOIN datoscontato WHERE datospersonales.Id=:pdoid AND datoscontato.id =:pdoid",Array('pdoid'=>$uid));

foreach ($qr as $cnv) {
?>
   <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
         <input type="text" name="id" value=<?=$cnv['id']?> style="display: none;">
         <input type="text" name="nombre" id="nombre" placeholder="nombre" value=<?=$cnv['nombre']?>>
        </div>
	</div>
</br>
    <div class="row">
       <div class="col-md-3">
        </div>
       <div class="col-md-6">
        <input type="text" placeholder="apellido_paterno" name="apellido_paterno" value=<?=$cnv['apePaterno']?> >
       	<input type="text" placeholder="apellido_materno" name="apellido_materno" value=<?=$cnv['apeMaterno']?> >
       </div>
    </div>
</br>
    <div class="row">
       <div class="col-md-3">
       </div>
       <div class="col-md-6">
       <input type="text" name="edad" placeholder="edad" value=<?=$cnv['edad']?> >
       <input type="text" name="sex" placeholder="genero" value=<?=$cnv['sexo']?>>
       </div>
    </div>
</br>

    <div class="row">
       <div class="col-md-3">
       </div>
       <div class="col-md-6">
       <input type="text" name="fecha" placeholder="fecha" value=<?=$cnv['fecha_nacimiento']?> >
       <input type="text" name="url" id="img_index" placeholder="url" value=<?=$cnv['foto']?>>
       <input type="button" name="" onclick="openPopup();" value="buscar">
       </div>
      
    </div>
</br>
    <div class="row">
       <div class="col-md-3">
       </div>
       <div class="col-md-6">
       <input type="text" name="correo_electronico" placeholder="correo" value=<?=$cnv['correo']?> >
       <input type="text" name="telefono" placeholder="telefono" value=<?=$cnv['telefono']?>>
       </div>
    </div>
</br>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
        	<input type="text" name="direccion" placeholder="direccion" value=<?=$cnv['direccion']?> >
        	<input type="text" name="numero_casa" placeholder="numero de casa" value=<?=$cnv['numero_casa']?>>
        </div>
    </div>
</br>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
        	<input type="text" name="municipio" placeholder="municipio" value=<?=$cnv['municipio']?>>
        	<input type="text" name="estado" placeholder="estado" value=<?=$cnv['estado']?>>
        </div>
    </div>

</br>
	<div class="row">
	   <div class="col-md-3">
	   </div>
	   <div class="col-md-6">
	   	   <input type="submit" class="btn btn-lg btn-primary">
	   </div>
		
	</div>
 </br>
 
<?php }
 }else
 {
  header("Location: http://localhost/programacionWeb/socialNetworkLogin.php");
 }
  ?>
 </form>
</body>


</html>