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
    $_SESSION['rol'] = $row['rolUsuario'];
    if ($row['rolUsuario'] === 'admin') {
      echo "<script>
          localStorage.setItem('logueado', '1');
          window.location.href='../pages/admin/admin.php';
        </script>";
    } else {
      echo "<script>
          localStorage.setItem('logueado', '1');
          window.location.href='../index.html';
        </script>";
    }
  } else {
    echo "<script>alert('Usuario o contraseña incorrectos');window.location.href='../pages/login.html';</script>";
  }
}
?>