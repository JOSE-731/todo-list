<?php
  //Importamos la conexion
  include_once('Conexion.php');
  //Creamos una variable la cual tomara el id que se enviara por el metodo get
  $id = $_GET['id'];
  //Creamos una consulta que elimine el id que se mandara por get
  $Eliminar = 'DELETE FROM detalles WHERE id=?';
  $SenEliminar = $pdo->prepare($Eliminar);
  //Pasamos el id de lo que vamos a eliminar
  $SenEliminar -> execute(array($id));

 //Pegamos este header diciendo que si los datos se editaron con exito se redireccione al inicio
 header('location:index.php');