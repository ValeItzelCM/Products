<?php

function ObtenerProducto()
{
    // Supongamos que la sesión ya está iniciada y que la variable de sesión existe
    $UsuarioID = $_SESSION['usuario_id'];

    global $conexion;
    $cnx = $conexion->conectar();

    // Consulta para obtener los productos del usuario
    $Query = "SELECT * FROM Productos WHERE UsuarioID = ?";
    $stmt = $cnx->prepare($Query);

    $stmt->bind_param("i", $UsuarioID); // Usamos 'i' porque es un entero
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificamos si hay productos encontrados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
                echo '<td>' . htmlspecialchars($row['Codigo']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Marca']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Modelo']) . '</td>';
            echo '</tr>';
        }
    } else {
        echo "No se encontraron productos.";
    }

    $stmt->close(); // Cerramos la declaración preparada
    $cnx->close(); // Cerramos la conexión
}

function ObtenerProductoPorCodigo($Codigo)
{
    // Supongamos que la sesión ya está iniciada y que la variable de sesión existe
    $UsuarioID = $_SESSION['usuario_id'];

    global $conexion;
    $cnx = $conexion->conectar();

    // Consulta para obtener los productos del usuario
    $Query = "SELECT * FROM Productos WHERE Codigo = ? AND UsuarioID = ?";
    $stmt = $cnx->prepare($Query);

    $stmt->bind_param("si", $Codigo, $UsuarioID); // Usamos 'i' porque es un entero
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificamos si hay productos encontrados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
                echo '<td>' . htmlspecialchars($row['Codigo']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Marca']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Modelo']) . '</td>';
            echo '</tr>';
        }
    } else {
        echo "No se encontraron productos.";
    }

    $stmt->close(); // Cerramos la declaración preparada
    $cnx->close(); // Cerramos la conexión
}