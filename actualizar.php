<script type="text/javascript">
	 window.location="http://localhost/programacionWeb/tabla.php";
</script>
<?php 
require('conn_db_pdo.php');
$id=$_POST['id'];   
$nombre=$_POST['nombre'];
$apePaterno=$_POST['apellido_paterno'];
$apeMaterno=$_POST['apellido_materno'];
$edad=$_POST['edad'];
$sexo=$_POST['sex'];
$correo=$_POST['correo_electronico'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$numero_casa=$_POST['numero_casa'];
$municipio=$_POST['municipio'];
$estado=$_POST['estado'];
$url=$_POST['url'];
$fecha=$_POST['fecha'];

DB::actualizar("UPDATE `datoscontato` SET `id`=:pdoid,`correo`=:pdocorreo,`telefono`=:pdotelefono,`direccion`=:pdodireccion,`numero_casa`=:pdocasa,`municipio`=:pdomunicipio,`estado`=:pdoestado WHERE id=:pdoid",Array('pdoid'=>$id,'pdocorreo'=>$correo,'pdotelefono'=>$apePaterno,'pdodireccion'=>$direccion,'pdocasa'=>$numero_casa,'pdomunicipio'=>$municipio,'pdoestado'=>$estado));

DB::actualizar("UPDATE `datospersonales` SET `id`=:pdoid,`nombre`=:pdonombre,`apePaterno`=:pdoapePaterno,`apeMaterno`=:pdoapeMaterno,`edad`=:pdoEdad,`sexo`=:pdosex,`foto`=:pdourl,`fecha_nacimiento`=:pdofecha WHERE id=:pdoid",Array('pdoid'=>$id,'pdonombre'=>$nombre,'pdoapePaterno'=>$apePaterno,'pdoapeMaterno'=>$apeMaterno,'pdoEdad'=>$edad,'pdosex'=>$sexo,'pdourl'=>$url,'pdofecha'=>$fecha));
?>