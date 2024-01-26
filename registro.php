<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Recuperar los valores del formulario
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $conexion=new PDO("mysql:host=localhost;dbname=test","root","");
    $sql="insert into usuarios (nombre, contraseña) values ('".$nombre."','".$contrasena."')";
    if ($conexion->query($sql)) {
        // Redirigir a la página de login
        header("Location: login.php");
        exit();
    } else {
        echo "Error al insertar datos: " . $conexion->error;
    }

}
?>

<html>
<body>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <p>Nombre
        <input type="text" name="nombre">
    </p>
    <p>
        <input type="text" name="contrasena">
    </p>
    <input type="submit">




</form>
</body>
</html>