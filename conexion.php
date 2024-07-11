<?php
// Conectar a base de datos, se requieren 4 datos de la db
    $nombreServidor = "localhost"; // nombre del servidor
    $usuarioBaseDatos = "root";  // nombre de usuario para acceder a la base de datos, por default es root
    $passwordBaseDatos = ""; // contraseña de la  base de datos
    $nombreBaseDatos = "sindi_db"; // nombre de la base de datos

    // Crear la conexión a la base de datos
    $conexion = new mysqli($nombreServidor, $usuarioBaseDatos, $passwordBaseDatos, $nombreBaseDatos);