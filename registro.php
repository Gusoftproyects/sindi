<?php

// cargar la libreria de alertas
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";



// echo "Hola Mundo"; // echo es para mostrar a pantalla
// para crear una variable tiene que empezar con el $ asi $color = "Rojo";


$user = $_POST['nombre'];  // Con el POST Obtengo el valor del input del formulario registro
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if ($password == $confirmPassword) {
    echo "
    <script> 
    document.addEventListener('DOMContentLoaded', function() {
       Swal.fire({
        title: 'Registro exitoso',
         text: 'Inicia sesión con tus datos',
         icon: 'success'
         }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.html';
            }
        });
    }); 
    </script> 
    ";
    
} else {
    echo "
    <script> 
    document.addEventListener('DOMContentLoaded', function() {
       Swal.fire({
        icon: 'error',
        title: '¡Error!',
        text: 'Las contraseñas deben ser iguales',
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.html';
            }
        });
    });
    </script>
        
    ";
}


// echo "Name: " . $user . " "; // Mostramos el nombre que se escribio en el form Registro
// echo "Email: " . $email;
// echo "Contraseña: " . $password;


// Conectar a base de datos, se requieren 4 datos de la db
$nombreServidor = "localhost"; // nombre del servidor
$usuarioBaseDatos = "root";  // nombre de usuario para acceder a la base de datos, por default es root
$passwordBaseDatos = ""; // contraseña de la  base de datos
$nombreBaseDatos = "sindi_db"; // nombre de la base de datos



// Crear la conexión a la base de datos
$conexion = new mysqli($nombreServidor, $usuarioBaseDatos, $passwordBaseDatos, $nombreBaseDatos);
// Verificar la conexión
if ($conexion->connect_error) { // busca dentro de la variable si hay un error en la conexion
    die("Conexión fallida: " . $conn->connect_error); // muestra el error que hay
} else {
    // echo "Conexion exitosa";    
}
