<?php

/*Creamos conexión con los datos que requiere PHP. Creamos una variable
#con los parámetros necesarios para establecerla.*/

if ($_POST) {
    $nombre = $_POST['NOMBRE'];
    $apellido = $_POST['APELLIDO'];
    $email = $_POST['EMAIL'];

/*Agrega esta línea para comprobar fallos, como me ha pasado a mí.*/
    var_dump($nombre, $apellido, $email);

/*Conexión con PDO. Son las variables necesarias para iniciar.*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursosql";

/*Creamos conexión con los datos que requiere PHP. Creamos una variable
#con los parámetros necesarios para establecerla.*/

$conn = new mysqli($servername, $username, $password, $dbname);

/*Comprobamos conexión.*/

if ($conn->connect_error) {
    die("¡La conexión falló! :(: " . $conn->connect_error);
}

/*Aquí hacemos la query.*/

$sql = "INSERT INTO USUARIO (NOMBRE, APELLIDO, EMAIL)
VALUES ('$nombre', '$apellido', '$email')";

/*Si todo va bien, mensaje de éxito. Si no, se pide que
se repita el proceso.*/

if ($conn->query($sql) === TRUE) {
    echo "¡Registro creado con éxito! :)";
} else {
    echo "¡Error!: " . $sql . "<br>" . $conn->error;
}

/*Cerramos la conexión. Lo ideal es ponerla, aunque las versiones
recientes ya lo hace solo.*/

$conn->close();

}
?>