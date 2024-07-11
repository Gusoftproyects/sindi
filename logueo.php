<?php 

include 'registro.php'; // incluye todo lo de otro archivo
include 'conexion.php';

$email = $_POST['email'];  // Con el POST Obtengo el valor del input del formulario iniciar sesion
$password = $_POST['password'];

$sql = "SELECT email, password FROM usuarios WHERE email = '$email', password = '$password'";

$result = $conexion->query($sql); // le mandamos la sentencia sql a la base de datos

if ($result->num_rows == 1) {
    echo 'Has iniciado sesion';
} else {
    echo 'Error, verifica tu informacion';
}