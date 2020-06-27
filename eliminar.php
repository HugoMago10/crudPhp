<?php
   include ("conexion.php");
   $id_alumno = $_GET['id_user'];
   $id_direccion = $_GET['id_dire'];
   elimina ($id_alumno, $id_direccion);
?>
