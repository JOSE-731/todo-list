<?php
//Importamos la conexion
  include_once('Conexion.php');
  

//Creamos una variable con la consulta
  $sql = 'SELECT * FROM detalles';
  //Creamos una variable donde pasamos la conexion que es $pdo y le decimos que prepare la consulta de la variable $sql
  $gsent = $pdo -> prepare($sql);
  //Aca pasamos el metodo execute para que se ejecute la consulta
  $gsent-> execute();
  //Creamos una variable con fetchAll, la cual pasaremos en un array toda nuestra consulta, el array se llamara resultado
  $resultado = $gsent -> fetchAll();

 
 
  //Creamos una condicion para verificar si estamos trabajando con el metodo get
  //Capturamos ese elemento que se esta mandando por id
  if($_GET){
  //Creamos una variable id que nos guarde el id que se manda por get
    $id = $_GET['id'];
    

   //Creamos la sentencia de leer la consulta
   //Traemos el id de la tabla detalles siempre y cuando sea igual al id que se trae por get
   $sqlEditar = 'SELECT * FROM detalles WHERE id=?';
   $preEditar = $pdo -> prepare($sqlEditar);
   //Pasamos el id para que sea remplazado
   $preEditar-> execute(array($id));
   //Ponemos fetch porque es un solo campo
   $resulEditar = $preEditar -> fetch();
  }
?>
<!doctype html>
        <html lang="en">
        <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
         .container{
           background:black;
           color: white;
         }

         .alert{
           color: white;
           background:red;
         }
        </style>
        <title>Tarea</title>
        </head>
            <body>
                <div class="container mt-5">
                  <div class="row">
                   <div class="col-md-6">
                    <h2 class = "mt-4"> <center>Lista De Tareas</center></h2>
                    <?php
                      //Hacemos un foreach para que recorra nuestro arreglo resultado el cual le pasamos la consulta
                      //Y creamos una variable local llamada dato que octendra los valores del arreglo
                      //7Colocamos dos puntos para decirle a php que el arreglo no esta cerrado
                      foreach($resultado as $dato):
                    ?>
                    <div class="alert mt-3 text-uppercase" role="alert">
                    <?php  
                    //Para acceder a los datos de la consultas que se pasaron en el arreglo resultado utilizamos el siguiente codigo
                    //Imprimimos la variable dato y le pasamos el item de la tabla
                     echo $dato['color']; 
                    ?>

                    -
                    <?php  
                    //Para acceder a los datos de la consultas que se pasaron en el arreglo resultado utilizamos el siguiente codigo
                    //Imprimimos la variable dato y le pasamos el item de la tabla
                     echo $dato['descripcion']; 
                    ?>
                     
                     <!--Mandamos por el metodo get el id de todo lo que se le de click para luego eliminar-->
                     <a href="Eliminar.php?id=<?php echo$dato['id']?>" class = "float-right ml-2"><i class="far fa-trash-alt "></i></a>


                    <!--Mandamos por el metodo get el id de todo lo que se le de click para editar-->
                    <a href="index.php?id=<?php  echo $dato['id']?>" class = "float-right">
                      <i class="fas fa-edit"></i>
                    </a>
                    </div>
                    <?php endforeach  //Cerramos el arreglo ?>
                 </div>
                    
                  <div class="col-md-6 mt-4">
                  <?php 
                       //Le decimos que si hay un metodo diferente de get se oculte el formulario
                      if(!$_GET):
                    ?>
                   <h2><center>Agregar Tarea </center> </h2>
                    <form method="POST" action="Agregar.php">
                      <input type="text" name="color" class = "form-control mt-3" placeholder="INGRESE EL COLOR"  autocomplete="off">
                      <input type="text" name="descripcion" class = "form-control mt-3" placeholder="INGRESE SU DESCRIPCION"  autocomplete="off">
                      <center><input type="submit" name="Enviar" value="Guardar" class = "btn btn-primary mt-3 mb-2"></center>
                    </div>
                    </form>
                    <?php include_once('Agregar.php');?>
                    <?php endif ?>
                    

                    <?php 
                       //Le decimos que si el  metodo es get muestre este formulario el formulario
                      if($_GET):
                    ?>
                      <h2> <center>Editar Registro</center></h2>
                      <form method="GET" action="Editar.php">
                        <input type="text" name="color" class = "form-control mt-3" value="<?php echo$resulEditar['color']?>"  autocomplete="off">
                        <input type="text" name="descripcion" class = "form-control mt-3" value="<?php echo$resulEditar['descripcion']?>"  autocomplete="off">
                        <input type="hidden" name="id" value="<?php echo$resulEditar['id']?>">
                      <center><input type="submit" value="Guardar" class = "btn btn-primary mt-3 mb-2"></center>
                    </form>
                    <?php endif ?>
                    </div>
                    </div>
                  </div>
                </div>
                
                
               

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://kit.fontawesome.com/e1f689b90b.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
        </html>