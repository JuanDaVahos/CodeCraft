<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombreUsuario = $_POST['nombreUsuario'];
  $contrasena = $_POST['contrasena'];

  // Verifica usuario y contraseña en la base de datos
  $sql = "SELECT * FROM usuarios WHERE nombreUsuario = ? AND contrasena = ?";
  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $nombreUsuario, $contrasena);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['usuario'] = $row['nombreUsuario'];
    echo "<script>
      localStorage.setItem('logueado', '1');
      window.location.href='../index.html';
      alert('¡Inicio de sesion exitoso!');
    </script>";
  } else {
    echo "<script>alert('Usuario o contraseña incorrectos');window.location.href='../pages/login.html';</script>";
  }
}
?>