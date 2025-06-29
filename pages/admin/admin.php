<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
  header('Location: ../login.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración | CodeCraft</title>
  <link rel="stylesheet" href="./admin.css">
</head>

<body>
  <div class="admin-container">
    <h1>Panel de Administración</h1>
    <div class="admin-btns">
      <a href="contratos.php">Revisar Contratos</a>
      <a href="postulaciones.php">Personas que quieren trabajar</a>
      <a href="contactos.php">Mensajes de Contacto</a>
    </div>
    <button id="logoutLink">Cerrar Administrador</button>
  </div>
  <script>
    document.getElementById('logoutLink').addEventListener('click', function () {
      localStorage.removeItem('logueado');
      window.location.href = "../login.html";
    });
  </script>
</body>

</html>