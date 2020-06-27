<?php
  /*
    autor: Hugo Martinez Gonzalez
    Correo: hugo.mrtz.glez10@gmail.com
  */
  //**********************Obtengo una conexion******************************
  function getConexion (){
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $BD = "estudiante";
    $puerto = "3306";
    $conexion = new mysqli($servidor,$usuario,$password,$BD,$puerto);

    if ($conexion-> connect_error){
      die("Error al intentar conectarse".$conexion->connect_error);
    }
    return $conexion;
  }

  //**********************Inserta nuevo Registro******************************
  function insertDato ( ){
    if (isset($_POST["btnEnviar"])){
      $conexion = getConexion();
      $nombre = $_POST["txtNombre"];
      $apeMat = $_POST["txtApeMat"];
      $apePat = $_POST["txtApePat"];
      $fechaN = $_POST["txtfechaN"];
      $calle = $_POST["txtCalle"];
      $numero = $_POST["txtNumero"];
      $colonia = $_POST["txtColonia"];
      $municipio = $_POST["txtMunicipio"];
      $estado = $_POST["txtEstado"];

      if ($nombre !=null || $apeMat !=null || $apeMat !=null || $fechaN!=null ||
          $calle!=null || $numero!=null ||$colonia!=null ||municipio!=null ||
          $estado!=null){

        //sql para insertar datos del alumno
        $sqlInsert1 = "insert into alumno (nombre, apeMat, apePat, fecha_nac)
          values ('$nombre','$apeMat','$apePat','$fechaN')";
        $res1 = $conexion->query ($sqlInsert1);//se obtiene un valor booleano

        //Sql para insertar datos de la direccion
        $sqlInsert2 = "insert into direccion (calle,numero,colonia,municipio,estado,id_alumno)
        values('$calle','$numero','$colonia','$municipio', '$estado','$conexion->insert_id')";
        $res2 = $conexion->query ($sqlInsert2);

        //Si las dos operaciones se ejecutaron bien entonces.
        if ($res1===true && $res2===true){
          header("location:listar.php");
        }else{
          die ("Error al insertar registros");
        }
        $conexion->close();
      }
    }
  }

  //********************Obtengo todos los registros****************************
  function getListaAlumno (){
    //Hacer una consulta para traer los datos de la BD.
    $conexion = getConexion();

    $result = $conexion->query ("select * from alumno left join direccion
    on alumno.id_alumno = direccion.id_alumno");

    //mientras haya registro en la base de datos
    while ($row = $result->fetch_assoc()){
      $rows[] = $row;//almacena en rows registros de la base de datos
    }
    //cerrando la conexion
    $conexion->close();

    //regresa una matriz de arrays.
    return $rows;
  }

  //****************Obtengo una sola consulta***********************************
  function getAlumno ($id_usuario){

    $conexion = getConexion();
    $result = $conexion->query ("select * from alumno left join direccion
    on alumno.id_alumno = direccion.id_alumno where alumno.id_alumno=".$id_usuario);

    $row = $result->fetch_assoc();
    $conexion->close();

    return $row;
  }

  //******************Eliminando filas******************************************
  function elimina ($id_alumno, $id_direccion){
    $conexion = getConexion ();
    $result1 = $conexion->query("delete from alumno where id_alumno='$id_alumno'");
    $result2 = $conexion->query("delete from direccion where id_direccion='$id_direccion'");

    //Si las dos operaciones se ejecutaron bien entonces.
    if ($result1===true && $result2===true){
      header("location:listar.php");
    }else{
      die ("Error al borrar los registros".$conexion->error);
    }
    $conexion->close();
  }

  //****************Editar un valor de la BD***********************************
  function editaDato (){

    if (isset($_POST["btnActualizar"])){
      //Obteneiendo los datos de los campos a editar
      $conexion = getConexion();
      $id_alumno = $_POST['id_alumno'];
      $nombre = $_POST["txtNombre"];
      $apePat = $_POST["txtApePat"];
      $apeMat = $_POST["txtApeMat"];
      $fechaN = $_POST["txtfechaN"];

      $id_direcc = $_POST['id_direccion'];
      $calle = $_POST["txtCalle"];
      $numero = $_POST["txtNumero"];
      $colonia = $_POST["txtColonia"];
      $municipio = $_POST["txtMunicipio"];
      $estado = $_POST["txtEstado"];

      if ($nombre !=null || $apeMat !=null || $apeMat !=null || $fechaN!=null ||
          $calle!=null || $numero!=null ||$colonia!=null ||municipio!=null ||
          $estado!=null){

        //sql para actualizar los datos del alumno
        $sqlInsert1 = "update alumno set nombre='$nombre', apePat='$apePat',
          apeMat='$apeMat', fecha_nac='$fechaN' where id_alumno = '$id_alumno'";
        $res1 = $conexion->query ($sqlInsert1);//se obtiene un valor booleano

        //Sql para insertar datos de la direccion
        $sqlInsert2 = "update direccion set calle='$calle', numero='$numero',
          colonia='$colonia',municipio='$municipio',estado='$estado'
          where id_direccion='$id_direcc'";
        $res2 = $conexion->query ($sqlInsert2);

        //Si las dos operaciones se ejecutaron bien entonces.
        if ($res1===true && $res2===true){
          header("location:listar.php");
        }else{
          die ("Error al insertar registros".$conexion->error);
        }
        $conexion->close();
      }
    }
  }
?>
