<?php

/* Esto es por si queremos saber la información de PHP que estamos usando:
phpinfo(); */

/* Esto es para que muestre errores. */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Conexión con PDO. Son las variables necesarias para iniciar. */
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cursosql";

/* Creamos conexión con los datos que requiere PHP. Creamos una variable
con los parámetros necesarios para establecerla. */
$conn = new mysqli($servername, $username, $password, $dbname);

/* Comprobamos conexión. */
if ($conn->connect_error) {
    die("¡La conexión falló! :(: " . $conn->connect_error);
}

$error = '';

/*Ponemos las variables de la base de datos.*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["NOMBRE"];
    $apellido = $_POST["APELLIDO"];
    $email = $_POST["EMAIL"];

/* Agrega esta línea para comprobar fallos, como me ha pasado a mí.
var_dump($nombre, $apellido, $email);*/

if (empty($nombre) || empty($apellido) || empty($email)) {
        $error = '¡Por favor, rellene todos los campos para completar el registro!';
} else {

/* Aquí hacemos la query. */
$sql = "INSERT INTO USUARIO (NOMBRE, APELLIDO, EMAIL) VALUES ('$nombre', '$apellido', '$email')";

/* Si todo va bien, mensaje de éxito. Si no, se pide que se repita el proceso. */
    if ($conn->query($sql) === TRUE) {
        echo "¡Registro creado con éxito! :) <br>";
        echo "Nombre: " . $nombre . "<br>";
        echo "Apellido: " . $apellido . "<br>";
        echo "Email: " . $email . "<br>";;
    } else {
        echo "¡Error!: " . $sql . "<br>" . $conn->error;
    }

/* Cerramos la conexión. Lo ideal es ponerla, aunque las versiones recientes ya lo hacen solo. */
        $conn->close();
    }
}
?>