<?php
//Importamos la conexion
include_once('Conexion.php');

//Obtenemos las variables via get
 $id = $_GET['id'];
 $descrip = $_GET['descripcion'];
 $color = $_GET['color'];

 //Creamos la consulta
 //Actualizacion en la tabla detalle con los campos colores y descripcion donde tendra un id
 // este signo (?) es para evitar inyecciones sql
 //Y sin el where se cambian todos los campos
 $sql = 'UPDATE detalles SET color=?,descripcion=? WHERE id=?';

 //Preparamos la sentencia
 //Pasamos la conexion y por ultimo la consulta
 $Editar = $pdo ->prepare($sql);

 //Luego ejecutamos la consulta
 //Creamos un array de los campos que seran editados
 $Editar->execute(array($color,$descrip,$id));

 //Pegamos este header diciendo que si los datos se editaron con exito se redireccione al inicio
 header('location:index.php');




