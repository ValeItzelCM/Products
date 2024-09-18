<?php
include("../Scripts/Conexion.php"); 
$conexion = new Conexion();

// Http(POST, Autenticar) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
if (isset($_POST['Autenticar'])) {
    AutenticarUsuario(
        $_POST['NombreUsuario'], 
        $_POST['Clave']
    );
}

// Http(GET, CerraSesion) - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
if (isset($_GET["CerraSesion"])) {
    // 1. Limpiar todas las variables de sesión
    $_SESSION = array();

    // 2. Eliminar la cookie de sesión si existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, 
            $params["path"], $params["domain"], 
            $params["secure"], $params["httponly"]
        );
    }

    // 3. Destruir la sesión
    session_destroy();

    header("Location: $conexion->url/Index.php");
    exit(); // Es importante usar exit() después de redirigir
    return;
}

// FUNCIONES - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
function AutenticarUsuario($usuario, $clave)
{
    global $conexion; 
    $cnx = $conexion->conectar();

    $Query = "SELECT ID, UserName FROM Usuarios WHERE UserName = ? AND Clave = ?";
    $stmt = $cnx->prepare($Query);

    $stmt->bind_param("ss", $usuario, $clave); 
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se obtuvo un resultado
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc(); // Obtener los datos del usuario
        
        session_start(); //INICIO LA SESIÓN 
        $_SESSION['usuario_id'] = $row['ID'];
        $_SESSION['usuario'] = $row['UserName']; 

        header("Location: $conexion->url/Views/Home.php");
    } else {
        // Establecer la cookie antes de la redirección
        setcookie('UserError', 'danger', time() + 3600, "/");
        // Redirigir a la página de inicio
        header("Location: $conexion->url/Index.php");
        exit(); //detener el script después de la redirección
    }

    $stmt->close(); 
    $cnx->close();
}
