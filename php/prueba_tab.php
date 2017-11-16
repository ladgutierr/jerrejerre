<!DOCTYPE html>
<html>
  <head>
    <title>Busqueda Pacientes</title>
  </head>
  <body>
  <form name="frmBuscar" action="#" method="post">
    <fieldset>
      <legend>
        <b>Buscar Paciente</b>
      </legend>
      <fieldset>
        <legend>
          <b>Tipo Busqueda</b>
        </legend>
        <input type="radio" name="rdbBuscar" value="id" checked/>Id
        <input type="radio" name="rdbBuscar" value="nombre"/>Nombre
        <input type="radio" name="rdbBuscar" value="apellido"/>Apellido</br>
        Buscar: <input type="text" name="txtBuscar"/>
        <input type="submit" value="Buscar"/>
      </fieldset>
    </fieldset>
    </body>
  </form>
</html>
<?php
  $seleccion = isset($_POST['rdbBuscar']) ? $_POST['rdbBuscar'] : null;
  $busqued = isset($_POST['txtBuscar']) ? $_POST['txtBuscar'] : null;
  $link = mysql_connect("localhost", "root", "", "root") or die ('Error de conexion: ' . mysql_error());
  if (strlen($busqued)>1){
    if ($seleccion=="nombre"){
      $result= mysql_query($link,"SELECT email, nombre, apellido, codigo FROM persona WHERE nombre='$busqued'");
      echo " <table border = 1 cellspacing = 1 cellpadding = 1> <tr> <th>Id</th> <th>Nombre</th> <th>Apellidos</th> <th>Edad</th> </tr>";
      while($row = mysql_fetch_array($result)){
        echo " <tr> <td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[3]."</td> </tr>";
      }
      echo "</table>";
    }else if ($seleccion=="apellido"){
      $result= mysql_query($link,"SELECT email, nombre, apellido, codigo FROM persona WHERE apellido='$busqued'");
      echo " <table border = 1 cellspacing = 1 cellpadding = 1> <tr> <th>Id</th> <th>Nombre</th> <th>Apellidos</th> <th>Edad</th> </tr>";
      while($row = mysql_fetch_array($result)){
        echo " <tr> <td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[3]."</td> </tr>";
      }
      echo "</table>";
    }else if ($seleccion=="codigo"){
      $result= mysql_query($link,"SELECT email, nombre, apellido, codigo FROM persona WHERE codigo='$busqued'");
      echo " <table border = 1 cellspacing = 1 cellpadding = 1> <tr> <th>Id</th> <th>Nombre</th> <th>Apellidos</th> <th>Edad</th> </tr>";
      while($row = mysql_fetch_array($result)){
        echo " <tr> <td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[3]."</td> </tr>";
      }
      echo "</table>";
    }
  }
  mysql_close($link);
?>