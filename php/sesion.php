<?php
  include 'db.php';
  
  session_start();
  $usuario=$_POST['user'];
  $contrasena=$_POST['contrasenia'];
  
  $consulta="SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasenia='$contrasena'";
  $resultado=mysqli_query($connection,$consulta);
  if($resultado->num_rows >0){
    while($fila=mysqli_fetch_row($resultado)){
            if($fila[4]="alumno"){
                $_SESSION['usuario']=$usuario;
                ?>               
                <script type="text/javascript">alert("Correcto");</script>
                <?php
                header("Location: ../homeAlumnos.html"); 
            }elseif($fila[4]="profesor"){
                $_SESSION['usuario']=$usuario;
                printf("<script type=\"text/javascript\">alert(\"Correcto\");</script>");
                header("Location: ../homeMaestros.html");   
            }
        }
  }else{
    
    header("Location: ../registro.hmtl");
    ?>
    <h1>No se encontró el usuario favor de registrarse</h1>
    <?php
    
    }
  

?>