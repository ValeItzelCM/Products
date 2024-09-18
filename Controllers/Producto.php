<?php
include("../Scripts/Conexion.php"); 

session_start();
$conexion = new Conexion();

if(isset($_POST["agregarProducto"])){
    AgregarProducto(
        $_POST["NombreProducto"], 
        $_POST["Codigo"],
        $_POST["Marca"],
        $_POST["Modelo"],
        $_SESSION['usuario_id']
    );
}

function AgregarProducto($nombre, $codigo, $marca, $modelo, $usuarioID){
    // Crear la conexión a la base de datos
    global $conexion;
    $cnx = $conexion->conectar();

    // Consulta para insertar el producto en la base de datos
    $query = "INSERT INTO Productos (Nombre, Codigo, Marca, Modelo, UsuarioID) VALUES (?, ?, ?, ?, ?)";
    $stmt = $cnx->prepare($query);

    // Vincular los parámetros a la consulta
    $stmt->bind_param("ssssi", $nombre, $codigo, $marca, $modelo, $usuarioID);

    // Ejecutar la consulta
    if ($stmt->execute()) {
       header("Location: $conexion->url/Views/Home.php");
    } else {
        echo "Error al agregar el producto: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $cnx->close();
}