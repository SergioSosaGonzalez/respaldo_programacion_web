<?php include_once ('conn_db_pdo.php'); ?>
<head>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
	
</head>
<table class="table" id="myTable">
<thead>
<tr>
<th>#</th>
<th>Institución/Empresa</th>
<th>Fecha firma</th>
<th></th>
</tr>
</thead>
<form>
<tbody>
  <?php 
  $qr=DB::consulta("SELECT id,nombre,apePaterno FROM formulario");
  
  foreach ($qr as $cnv) { 
  ?>
<tr>
<td><?=$cnv['id'] ?></td>
<td><?=$cnv['nombre']?> 

</td>
<td><?=$cnv['apePaterno']?></td>
<td>
</div>
</td>
</tr><?php  }

?> 
</tbody>
</form>
</table>