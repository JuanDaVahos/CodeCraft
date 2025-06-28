<?php

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombreUsuario = $_POST['nombreUsuario'];
  $contrasena = $_POST['contrasena'];

  $sql = "INSERT INTO usuarios (nombreUsuario, contrasena) VALUES (?, ?)";
  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $nombreUsuario, $contrasena);

  if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('¡Registro exitoso!');window.location.href='../index.html';</script>";
  } else {
    echo "Error: " . mysqli_error($conexion);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conexion);

}

?>