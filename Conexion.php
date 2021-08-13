<?php
    
    //Creamos una variable con los datos de nuestro servidor, nombre de la bd
    //Nombre de usuario y contraseña
    $link = 'mysql:host=localhost;dbname=tareas';
    $usuario = 'root';
    $contraseña = "";


    //Creamos una exepcion a la cual le pasaremos las variables que creamos
    try{
        $pdo = new PDO($link,$usuario,$contraseña);
        //Creamos un foreach que recorrera el arreglo llamado pdo
        //Y le asignamos el query el cual hara una consulta a nuestra bd
        //la consulta se le guardara en un arreglo llamado fila
        foreach($pdo->query('SELECT * from detalles') as $fila) {
           
        }
        
    }catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
        
    }
   



       