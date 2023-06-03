<?php

/*Creamos conexión con los datos que requiere PHP. Creamos una variable
#con los parámetros necesarios para establecerla.*/

if ($_POST) {
    $nombre = $_POST['NOMBRE'];
    $apellido = $_POST['APELLIDO'];
    $email = $_POST['EMAIL'];

/*Conexión con PDO. Son las variables necesarias para iniciar.*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursosql";

/*Creamos conexión con los datos que requiere PHP. Creamos una variable
#con los parámetros necesarios para establecerla.*/

$conexion = new mysqli($servername, $username, $password, $dbname);

/*Comprobamos conexión.*/

if ($conexion->conexion_error) {
    die("¡La conexión falló! :(: " . $conexion->conexion_error);
}

/*Aquí hacemos la query.*/

$sql = "INSERT INTO USUARIO (NOMBRE, APELLIDO, EMAIL) VALUES ('$nombre', '$apellido', '$email')";

/*Si todo va bien, mensaje de éxito. Si no, se pide que
se repita el proceso.*/

if ($conexion->query($sql) === TRUE) {
    echo "¡Registro creado con éxito! :)";
} else {
    echo "¡Error!: " . $sql . "<br>" . $conexion->error;
}

/*Cerramos la conexión. Lo ideal es ponerla, aunque las versiones
recientes ya lo hace solo.*/

$conexion->close();

}
?>