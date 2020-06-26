<?php
  //Se incluye el archivo para la iteracion con la BD
  include ("conexion.php");
  insertDato ();//Se llama al metodo de insertar los datos.
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Nuevo alumno</title>
  </head>
  <body>
    <div class="">
      <form class="" action="nuevo.php" method="post">

        <p><label>Nombre: <input type="text" name="txtNombre" value=""></label></p>
        <p><label>Apellido Pat: <input type="text" name="txtApeMat" value=""></label></p>
        <p><label>Apellido Mat: <input type="text" name="txtApePat" value=""></label></p>
        <p><label>Fecha Nacimiento: <input type="date" name="txtfechaN" value=""></label></p>

        <p><label>Calle: <input type="text" name="txtCalle" value=""></label></p>
        <p><label>Numero: <input type="number" name="txtNumero" value=""></label></p>
        <p><label>Colonia: <input type="text" name="txtColonia" value=""></label></p>
        <p><label>Municipio: <input type="text" name="txtMunicipio" value=""></label></p>
        <p><label>Estado: <input type="text" name="txtEstado" value=""></label></p>

        <p><input type="submit" name="btnEnviar" value="Enviar"></p>
        
      </form>
      <a href="listar.php">Regresar inicio</a>
    </div>
  </body>
</html>
