<?php
include_once('Conexion.php');
 //Agregar
  //Hacemos una condicion que si se esta enviando algo por ese metodo que se pinte por pantalla
  if($_POST){
     //Creamos dos variables de los dos campos que ingresa el usuario
   $color = $_POST['color'];
   $descripcion = $_POST['descripcion'];

   //Creamos el sql para agregar
   $agregar = 'INSERT INTO detalles (color,descripcion) VALUES (?,?)';
  //Creamos una variable donde pasamos la conexion que es $pdo y le decimos que prepare la consulta de la variable $sql
  $senAgregar = $pdo -> prepare($agregar);
  //Aca pasamos el metodo execute para que se ejecute la consulta y ademas creamos un array con el que le pasaremos los campos
  $senAgregar-> execute(array($color,$descripcion));
  
  //Creamos un header para que se recargue la pagina
  header('location:index.php');
  
  if($senAgregar){
    ?>
    <h2>Guardado Con Exito</h2>
    <?php
  }

  }
?>