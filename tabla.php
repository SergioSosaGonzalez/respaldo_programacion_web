<?php require('conn_db_pdo.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabla de usuarios</title>
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <style type="text/css">
      label,span{
        color:#FFFFFF;
      }
      nav a:hover{
        font-size: 25px;
        color: white !important;
        transition: font-size 0.5s;

      }
    </style>

</head>

<body>
<?php 
require('EstaLogueado.php');
if($estado)
{
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://localhost/programacionWeb/formulario.php">Formulario</a>
          <a class="navbar-brand" href="http://localhost/programacionWeb/tabla.php">Usuarios</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="SalirLogin.php">
            <div class="form-group">
              <label><?=$_SESSION['dev'];?></label>
            </div>
            <button type="submit" class="btn btn-success">Cerrar sesion</button>
          </form>
        </div>
      </div>
</nav>
</br>
</br>
</br>
 <div class="datagrid">
   <table class="order-table table">
   <thead>
   	<tr class="titulo">
   		<td>ID</td>
   		<td>Nombre</td>
   		<td>Acción</td>
   	</tr>
   </thead>
   	<tbody>
   	<?php 
    $confirmandoId="";
    $qr=DB::consulta("SELECT * FROM datospersonales INNER JOIN datoscontato WHERE datospersonales.id=datoscontato.id");
    foreach ($qr as $cnv) {
    ?>
        
     		<tr>
        <td><?=$cnv['id']?></td>
   			<td><a href="detalle.php?id=<?=$cnv['id']?>"><?=$cnv['nombre']?></a></td>
   			<td>
   			<input type="button" name="" class="btn btn-xs btn-danger" onclick="eliminar(<?=$cnv['id']?>);" value="X">
        <input type="image" name="" class="btn btn-xs btn-info" onclick="actualizar(<?=$cnv['id']?>);" src="img/palomita.png" width="23" height="23">
   			</td>
   		</tr>
   	<?php } ?>	
   	</tbody>
   </table>
</div>
</body>
<?php 
}
else
{
  echo "<script> alert('Inicie sesion')</script>";
  echo "<script>window.location='http://localhost/programacionWeb/socialNetworkLogin.php'</script>";
}
?>
<script type="text/javascript">
        function eliminar(pId)
        {

          window.location="eliminar.php?id="+pId; 
        }

        function actualizar(pId)
        {
          window.location="actualizar_formulario.php?id="+pId;
        }

    </script>
</html>