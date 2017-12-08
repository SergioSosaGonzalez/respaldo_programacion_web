<?php
 require('conn_db_pdo.php');
 /**
 * 
 */
$conexion= DB::getInstance();
$nombre=$_POST['nombre'];
$apePaterno=$_POST['apePaterno'];
$apeMaterno=$_POST['apeMaterno'];
$edad=$_POST['rangoEdad'];
$sexo=$_POST['sexo'];
if($sexo=="0")
{
		$sexo="Masculino";
}else
{
		$sexo="Femenino";
}
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$numero_casa=$_POST['numero_casa'];
$municipio=$_POST['municipio'];
$estado=$_POST['estado'];
$urlFoto=$_POST['imagen'];
$fecha=$_POST['fecha_nacimiento'];



//echo $municipio;

//$consulta = DB::consulta("select * from formulario where id=:pdoid AND nombre=:pdonombre AND edad=:pdoedad",                                            array('pdoid'=>1, 'pdonombre'=>'sergio','pdoedad'=>10));

/*
DB::insertar("INSERT INTO `formulario`(`id`, `nombre`, `apePaterno`, `apeMaterno`, `edad`, `sexo`, `correo_electronico`, `telefono`, `direccion`, `numero_casa`, `municipio`, `estado`, `Foto`,`fecha_nacimiento`) VALUES (:pdoid,:pdonombre,:pdoapepaterno,:pdoapematerno,:pdoedad,:pdosexo,:pdocorreo,:pdotelefono,:pdodireccion,:pdocasa,:pdomunicipio,:pdoestado,:pdofoto,:pdofecha)", array('pdoid'=>null,'pdonombre'=>$nombre,'pdoapepaterno'=>$apePaterno,'pdoapematerno'=>$apeMaterno,'pdoedad'=>$edad,'pdosexo'=>$sexo,'pdocorreo'=>$correo,'pdotelefono'=>$telefono,'pdodireccion'=>$direccion,'pdocasa'=>$numero_casa,'pdomunicipio'=>$municipio,'pdoestado'=>$estado,'pdofoto'=>$urlFoto,'pdofecha'=>$fecha));
*/
DB::insertar("INSERT INTO `datospersonales`(`Id`, `nombre`, `apePaterno`, `apeMaterno`, `edad`, `sexo`, `foto`, `fecha_nacimiento`) VALUES (:pdoid,:pdonombre,:pdoapePaterno,:pdoapeMaterno,:pdoedad,:pdosexo,:pdofoto,:pdonacimiento)",array('pdoid'=>null,'pdonombre'=>$nombre,'pdoapePaterno'=>$apePaterno,'pdoapeMaterno'=>$apeMaterno,'pdoedad'=>$edad,'pdosexo'=>$sexo,'pdofoto'=>$urlFoto,'pdonacimiento'=>$fecha));

DB::insertar("INSERT INTO `datoscontato`(`id`, `correo`, `telefono`, `direccion`, `numero_casa`, `municipio`, `estado`) VALUES (:pdoid,:pdocorreo,:pdotelefono,:pdodireccion,:pdonumeroCasa,:pdomunicipio,:pdoestado)",array('pdoid'=>null,'pdocorreo'=>$correo,'pdotelefono'=>$telefono,'pdodireccion'=>$direccion,'pdonumeroCasa'=>$numero_casa,'pdomunicipio'=>$municipio,'pdoestado'=>$estado));



/*
DB::insertar("INSERT INTO `datoscontacto`(`id`,`correo`, `telefono`, `direccion`, `numero_casa`, `municipio`, `estado`) VALUES (:pdoid,:pdocorreo,:pdotelefono,:pdodireccion,:pdocasa,:pdomunicipio,:pdoestado)", array('pdoid'=>null,'pdocorreo'=>$correo,'pdotelefono'=>$telefono,'pdodireccion'=>$direccion,'pdocasa'=>$numero_casa,'pdomunicipio'=>$municipio,'pdoestado'=>$estado));
*/

echo "listo";
echo "<script> alert('datos enviados')</script>"
//print_r($consulta); 
?>

<script type="text/javascript">
	window.location="http://localhost/programacionWeb/socialNetworkLogin.php"
</script>