<?php
  include('conexion.php');

  if (!isset($_POST["btnActualizar"])){
    $id_usu = $_GET["id_user"];
    $id_dir = $_GET["id_dire"];
    $row = getAlumno($id_usu);
  }else {
    editaDato();
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Editar Alumno</title>
  </head>
  <body>
    <div class="">
      <form class="" action="editar.php" method="post">

        <input type="hidden" name="id_alumno" value="<?php echo $row['id_alumno'] ?>">
        <p><label>Nombre: <input type="text" name="txtNombre" value="<?php echo $row['nombre'] ?>"></label></p>
        <p><label>Apellido Pat: <input type="text" name="txtApePat" value="<?php echo $row['apePat'] ?>"></label></p>
        <p><label>Apellido Mat: <input type="text" name="txtApeMat" value="<?php echo $row['apeMat'] ?>"></label></p>
        <p><label>Fecha Nacimiento: <input type="date" name="txtfechaN" value="<?php echo $row['fecha_nac'] ?>"></label></p>

        <input type="hidden" name="id_direccion" value="<?php echo $row['id_direccion'] ?>">
        <p><label>Calle: <input type="text" name="txtCalle" value="<?php echo $row['calle'] ?>"></label></p>
        <p><label>Numero: <input type="number" name="txtNumero" value="<?php echo $row['numero'] ?>"></label></p>
        <p><label>Colonia: <input type="text" name="txtColonia" value="<?php echo $row['colonia'] ?>"></label></p>
        <p><label>Municipio: <input type="text" name="txtMunicipio" value="<?php echo $row['municipio'] ?>"></label></p>
        <p><label>Estado: <input type="text" name="txtEstado" value="<?php echo $row['estado'] ?>"></label></p>

        <p><input type="submit" name="btnActualizar" value="Editar Informacion"></p>

      </form>
      <a href="listar.php">Regresar inicio</a>
    </div>
    <div class="">
    </div>
  </body>
</html>
