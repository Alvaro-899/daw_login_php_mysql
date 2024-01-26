<?php
$nombre=$_POST['nombre'];
$contrasena=$_POST['contrasena'];
echo $nombre;
echo $contrasena;

$conexion=new PDO("mysql:host=localhost;dbname=test","root","");

//echo (var_dump($conexion));
$consulta=$conexion->query("select * from usuarios where nombre='".$nombre."' and contraseña='".$contrasena."'");
//echo($consulta);
//while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
//    echo $fila['nombre'];
//}

if ($consulta->rowCount()>0){
    session_start();
    $token = bin2hex(random_bytes(32)); // Genera un token aleatorio de 64 caracteres hexadecimales

    // Almacena el token en la sesión
    $_SESSION["token"] = $token;
    $_SESSION["nombre"]=$nombre;
    header("location:welcome.php");
}
else{
    header("location:registro.php");
}
