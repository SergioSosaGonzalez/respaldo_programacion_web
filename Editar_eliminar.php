<?php require('conn_db_pdo.php');?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"  href="css/bootstrap.min.css">

    <script type="text/javascript">
(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>
    
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">

</div>
</nav>

<div class="container">
	<div class="jumbotron">
		<h2>Eliminación y edición de los datos del formulario</h2>
	</div>
</div>

<div class="container">
   <div class="row">
        <div class="col-md-4"></div>
   	    <div class="col-md-6">
        <form method="post" action="eliminar.php">
           <input type="search" name="id" class="light-table-filter" data-table="order-table" id="id_consulta" placeholder="Id aquí">
   	       <input type="submit" class="btn btn-lg btn-default" value="Eliminar" name="">
   	    </form>	
        </br>
        <form method="post" action="actualizar_formulario.php">
            <input type="search" name="id_update"  placeholder="Id aquí">
            <input type="submit" class="btn btn-lg btn-primary" value="actualizar" name="">
        </form>
   	    </div>
   </div>

   <div class="datagrid">
      <table class="order-table table">
        <thead>
        <tr class="titulo"> 
          <td>
            ID
          </td>
          <td >
            NOMBRE
          </td>
          <td>
            apePaterno
          </td>
        </tr>
      </thead>
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
   
             </tr><?php  }

              ?> 
      </tbody>
      </table>
    </div>
	
</div>

</body>
<script type="text/javascript">
	function consulta()
	{
         var id=document.getElementById("id_consulta").value;
         
         <?php
            print_r("<script> alert('datos enviados')</script>");
         ?>

	}
</script>
</html>