<?php 

//importar la conexion
require "includes/config/database.php";
$db = conectarDB();

//crear un email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// var_dump($passwordHash);
//query para agregar el ususario
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";

echo $query;
// exit;
//agregarlo a la base de datos
mysqli_query($db, $query);