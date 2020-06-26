<?php

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
        printf ("Datos insertados Correctamente");
      }else{
        die ("Error al insertar registros");
      }
      $conexion->close();
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
    $conexion->close();
    //regresa una matriz de arrays.
    return $rows;
  }

?>
