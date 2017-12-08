<?php 
require('conn_db_pdo.php');
$id = $_POST['id'];
$contrasenia = $_POST['password'];
$encriptacion = password_hash($contrasenia, PASSWORD_BCRYPT);


DB::actualizar("UPDATE `usuarios` SET `clave`=:pdoclave WHERE id=:pdoid",array('pdoclave'=>$encriptacion,'pdoid'=>$id));

echo "<script> window.location='http://localhost/programacionWeb/socialNetworkLogin.php'</script>";
?>