<?php
try{
$conn = new PDO('mysql:host=localhost;dbname=aplicacion_to_do_list','root','Cafe2023@');
}catch(PDOException $e){
    echo "Error de conexion:";
}

if(isset($_POST['id'])){

    $id=($_POST['id']);
    $completado=(isset($_POST['completado']))?1:0;

    $sql="Update tareas set completado=? where id=?";
    $sentencia=$conn->prepare($sql);
    $sentencia->execute([$completado,$id]);
}
if(isset($_POST['agregar_tarea'])){
    $tarea=($_POST['tarea']);
    $sql='Insert into tareas (tarea) value(?)';
    $sentencia=$conn->prepare($sql);
    $sentencia->execute([$tarea]);
}
if(isset($_GET['id'])){

    $id=$_GET['id'];
    $sql="Delete from tareas where id=?";
    $sentencia=$conn->prepare($sql);
    $sentencia->execute([$id]);
}

$sql="Select * from tareas";
$registros=$conn->query($sql);



?>