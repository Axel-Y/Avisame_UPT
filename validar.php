<?php
$usuario=$_POST['usuario'];
$contrasenia=$_POST['contrasenia'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","login");

$consulta=" SELECT*FROM usuarios where usuario='$usuario'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    $consulta=" SELECT*FROM usuarios where usuario='$usuario' and contrasenia='$contrasenia'";
    $resultado=mysqli_query($conexion,$consulta);
    $filas=mysqli_num_rows($resultado);
    if($filas){
        header("location:home.php");
    }else{
        ?>
        <?php
        include("index.php");
        ?>
        <h1>Contraseña incorrecta</h1>
        <?php

    }
}else{
    $nuevo="INSERT INTO usuarios (usuario,contrasenia) VALUES ('$usuario','$contrasenia');";
    $resultado=mysqli_query($conexion,$nuevo);
    header("location:home.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
