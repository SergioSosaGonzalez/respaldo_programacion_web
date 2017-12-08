<script type="text/javascript">
     alert('Datos eliminados');
	 window.location="http://localhost/programacionWeb/tabla.php";
</script>

<?php 
require('conn_db_pdo.php');

$id=$_GET["id"];

DB::eliminar("DELETE FROM `datoscontato`WHERE id=:pdoid",Array('pdoid'=>$id));
DB::eliminar("DELETE FROM `datospersonales`WHERE id=:pdoid",Array('pdoid'=>$id));

echo "Datos eliminados";


?>