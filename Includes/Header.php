<?php
include("../Scripts/Conexion.php");

$conexion = new Conexion();
session_start();
// LÓGICA PARA AUTENTICAR USUARIO - - - - - - - - - - - - 
if(!isset($_SESSION['usuario_id'])){

  $_SESSION = array();

  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000, 
          $params["path"], $params["domain"], 
          $params["secure"], $params["httponly"]
      );
  }

  session_destroy();

  header("Location: $conexion->url/Index.php");
  exit();
  return;
}
// LÓGICA PARA AUTENTICAR USUARIO - - - - - - - - - - - - 
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyPointOfSale</title>

  <link rel="stylesheet" href="../Content/css/bootstrap.min.css">
</head>

<body>
  <!-- Contenido - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --->