<?php
	 require_once ("APICl.php"); 
	 require('C:\xampp\htdocs\programacionWeb\conn_db_pdo.php');   
     $APICl = new APICl();
?>
<style>
	table {
		 border-collapse: collapse;
		 width: 100%;
	}
	
	th, td {
		 text-align: left;
		 padding: 8px;
	}
	tr:nth-child(even) {
		background-color: #f2f2f2
	}
</style>
<div style="overflow-x:auto;">
<?php 
$qr = DB::consulta("SELECT * FROM `datospersonales`");

foreach ($qr as $cnv) {

?>
<table border="0">
 	<tr>
     	<td>
     		CONCENTRADOR
      </td>
  </tr> <tr>
     	<td>
     		<?=$APICl->API($cnv['nombre'],$cnv['edad'],$cnv['sexo'],$cnv['apeMaterno'])?>
      </td>
  </tr> 
</table>
<?php } ?>
</div>