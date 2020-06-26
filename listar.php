<?php
  include ("conexion.php");
  //Cabecera tiene el mismo nombre que la columna de la BD para poder recorrer
  //campo del registro
  $cabecera = ['id_alumno','nombre','apePat','apePat','fecha_nac','calle','numero',
    'colonia','municipio','estado'];
  $registros = getListaAlumno(); //Obtengo el arreglo de registros
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lista de Alumnos</title>
  </head>
  <body>
    <header>
      <h1>Alumnos</h1>
    </header>
    <main>
      <p><a href="nuevo.php">Nuevo registro</a></p>

      <table border="1">
        <thead>
          <tr>
            <?php
            //imprime las cabeceras
              for ($i=0; $i <count($cabecera); $i++) {
                printf ("<th>%s</th>",$cabecera[$i]);
              }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
            //obtengo los registros
            for ($i = 0; $i < count($registros); $i++) {
              echo ("<tr>");
              //Obtengo cada columna del registro
              for ($j=0; $j <count($cabecera); $j++) {
                printf ("<td>  %s </td>", $registros[$i][$cabecera[$j]]);
              }
              echo ("</tr>");
            }
          ?>
        </tbody>
      </table>
    </main>
    <footer>
    </footer>
  </body>
</html>
