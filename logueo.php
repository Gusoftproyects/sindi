<?php
include 'conexion.php';

$email = $_POST['email'];  // Con el POST Obtengo el valor del input del formulario iniciar sesion
$password = $_POST['password'];

$sql = "SELECT email, password FROM usuarios WHERE email = '$email'";
$result = $conexion->query($sql); // le mandamos la sentencia sql a la base de datos
// var_dump($result);


if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    
    if (md5($password) === $row['password']) {
        echo 'Has iniciado sesion';
    } else {
        echo 'Error, verifica tu informacion';
    }
} else {
    echo "Verifica tu informacion";
}

