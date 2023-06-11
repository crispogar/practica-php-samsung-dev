<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de consulta</title>
    <link href="styleformulario.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

/* Decimos meterlo también con código HTML para luego poder editar el
apartado de formulario.php más fácilmente.

Esto es por si queremos saber la información de PHP que estamos usando:
phpinfo(); */

/* Esto es para que muestre errores. */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Conexión con PDO. Son las variables necesarias para iniciar. Como estoy
trabajando con mamp, me hace falta poner el password. */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cursosql";

/* Creamos conexión con los datos que requiere PHP. Creamos una variable
con los parámetros necesarios para establecerla. */

$conn = new mysqli($servername, $username, $password, $dbname);

/* Comprobamos la conexión. */

if ($conn->connect_error) {
    die("¡La conexión falló! :(: " . $conn->connect_error);
}

$error = '';

/* Ponemos las variables de la base de datos. */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["NOMBRE"];
    $apellido = $_POST["APELLIDO"];
    $email = $_POST["EMAIL"];

/* Agregamos esta línea para comprobar fallos, como me ha pasado a mí, y se quita
en un principio para que no se enseñe de forma fea la variables en los echo:
var_dump($nombre, $apellido, $email); */

if (empty($nombre) || empty($apellido) || empty($email)) {
        $error = '¡Por favor, rellena todos los campos para completar el registro!';
} else {

/* Aquí hacemos la query. */

    $sql = "INSERT INTO USUARIO (NOMBRE, APELLIDO, EMAIL) VALUES ('$nombre', '$apellido', '$email')";

/* Si todo va bien, sale un mensaje de éxito. Si no, se pide que se repita el proceso
con un error. */

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>";
        echo "¡Comprueba tu registro!<br /><br />";
        echo "<span class='info'>Nombre: " . $nombre . "</span>";
        echo "<span class='info'>Apellido: " . $apellido . "</span>";
        echo "<span class='info'>Email: " . $email . "</span><br /><br />";
        echo "</div>";

/* Aquí ponemos un echo y un hipervínculo para volver al formulario. */   

        echo "<a href='index.html' class='button'>Vuelve al formulario</a>";

/* Y si no ocurre lo anterior,  sale un mensaje de error. */ 

        } else {
            echo "¡Error!: " . $sql . "<br>" . $conn->error . "<br /><br />";
            echo "<a href='index.html' class='button'>Vuelve al formulario</a>";
        }

/* Generamos código JavaScript para mostrar un mensaje de alerta en el
navegador. */

    $mensaje = "¡Registro creado con éxito! :)";

    echo "<script>alert('$mensaje');</script>";

/* Cerramos la conexión. Lo ideal es ponerla, aunque las versiones recientes
ya lo hacen solo. */
        $conn->close();
    }
}
?>

</body>
</html>