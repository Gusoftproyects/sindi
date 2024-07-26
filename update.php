<?php
session_start(); // Se usan para guardar información de sesión
include 'conexion.php';
// Cargar la librería de alertas
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $servicio = $_POST['servicio'];
    $descripcion = $_POST['descripcion'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];

    // Manejo de la imagen
    $target_file = '';
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($imagen["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($imagen["tmp_name"]);

        if ($check !== false) {
            if (move_uploaded_file($imagen["tmp_name"], $target_file)) {
                // Archivo subido exitosamente
            } else {
                echo "Hubo un error al subir tu archivo.";
                exit;
            }
        } else {
            echo "El archivo no es una imagen.";
            exit;
        }
    } else {
        if ($id) {
            // Si no se sube un nuevo archivo, mantener el antiguo
            $sql = "SELECT imagen FROM servicios WHERE id = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $target_file = $row['imagen'] ?? '';
            $stmt->close();
        }
    }

    if ($id) {
        // Si hay un ID, actualizar el registro
        $sql = "UPDATE servicios SET servicio = ?, descripcion = ?, facebook = ?, instagram = ?, imagen = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssi", $servicio, $descripcion, $facebook, $instagram, $target_file, $id);
    } else {
        // Si no hay ID, insertar un nuevo registro
        $sql = "INSERT INTO servicios (servicio, descripcion, facebook, instagram, imagen, user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $user_id = $_SESSION['user_id']; // Suponiendo que el ID del usuario está almacenado en la sesión
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssi", $servicio, $descripcion, $facebook, $instagram, $target_file, $user_id);
    }

    if ($stmt->execute()) {
        echo "Registro guardado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $stmt->close();
}

// Cerrar la conexión
$conexion->close();

// Redirigir para evitar el reenvío de formularios
header("Location: login.php");
exit;
?>
