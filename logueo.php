<?php
session_start(); // se usan para guarda informacion de sesion
include 'conexion.php';
// cargar la libreria de alertas
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";


$email = $_POST['email'];  // Con el POST Obtengo el valor del input del formulario iniciar sesion
$password = $_POST['password'];
$sql = "SELECT email, password, nombre FROM usuarios WHERE email = '$email'";
$result = $conexion->query($sql); // le mandamos la sentencia sql a la base de datos
// var_dump($result);

if ($result->num_rows == 1) {
    $respuesta = $result->fetch_assoc(); // fetch es para recuperar informacion externa de la base de datos
    $passwordEncriptada = $respuesta["password"];

    if (password_verify($password, $passwordEncriptada)) {
        $nombreUsuario = $respuesta["nombre"];
        $_SESSION['nombre'] = $nombreUsuario; // guardar en variable de sesion el campo nombre de la consulta
        header("Location: bienvenida.php");
    } else {
        echo "
    <script> 
    document.addEventListener('DOMContentLoaded', function() {
       Swal.fire({
        title: 'Contraseña Incorrecta',
         text: 'Vuelve a ingresar tu contraseña',
         icon: 'error'
         }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.html';
            }
        });
    }); 
    </script> 
    ";
    }
} else {
    echo "
    <script> 
    document.addEventListener('DOMContentLoaded', function() {
       Swal.fire({
        title: 'Usuario no registrado',
         text: 'Registrate en el sistema',
         icon: 'error'
         }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.html';
            }
        });
    }); 
    </script> 
    ";

}
