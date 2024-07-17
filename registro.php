<?php
include 'conexion.php'; // incluye la conexion a la base datos

// cargar la libreria de alertas
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";



// echo "Hola Mundo"; // echo es para mostrar a pantalla
// para crear una variable tiene que empezar con el $ asi $color = "Rojo";


$nombre = $_POST['nombre'];  // Con el POST Obtengo el valor del input del formulario registro
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$passwordEncript = password_hash($password, PASSWORD_DEFAULT); // encriptacion

if ($password == $confirmPassword) {
    
    // Verificar la conexión
    if ($conexion->connect_error) { // busca dentro de la variable si hay un error en la conexion
        die("Conexión fallida: " . $conexion->connect_error); // muestra el error que hay
    } else { // si no hay error inserta los datos

        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss",$nombre, $email, $passwordEncript);
    
        if ($stmt->execute()) {
            // echo "Registro exitoso";
        } else {
            echo "Error: " . $stmt->error;
            die();
        }


    }
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
