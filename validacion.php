<?php 
require('conn_db_pdo.php');
$nombre_usuario = $_POST['nombre_usuario'];
$password = $_POST['password'];
$clave =" ";

$qr=DB::consulta("SELECT * FROM usuarios WHERE nombre_usuario=:pdonombre",array('pdonombre'=>$nombre_usuario));

if($qr==null)
{
	echo "<script> alert('contraseña o usuario incorrecto')</script>"; 
	echo "<script>window.location='http://localhost/programacionWeb/socialNetworkLogin.php'</script>";
}

foreach ($qr as $cnv) 
{
	     if($cnv['nombre_usuario'] == $nombre_usuario && password_verify($password,$cnv['clave']))
	     {
	     	 session_start();
	         echo "<script> alert('Ha ingresado correctamente'); </script>";
	         $clave = $cnv['id'];
	         $_SESSION['dev'] = $cnv['nombre_usuario'];
	         break;
	     }
	      else{
		  echo "<script> alert('contraseña o usuario incorrecto')</script>";
		  echo "<script>window.location='http://localhost/programacionWeb/socialNetworkLogin.php'</script>";
	      }
}
?>
<script type="text/javascript">
	window.location="http://localhost/programacionWeb/tabla.php";
</script>
