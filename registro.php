<?php 
// echo "Hola Mundo"; // echo es para mostrar a pantalla
// para crear una variable tiene que empezar con el $ -> $color = "Rojo";
$user = $_POST['nombre'];  // Obtengo el valor del input del formulario registro

echo $user; // Mostramos el nombre que se escribio en el form Registro

$contra1 = "N19";
$contra2 = "N192";
if ($contra1 == $contra2) {
    echo "Las contraseñas son iguales";
} else{
    echo "Las contraseñas no son iguales";

}



?>