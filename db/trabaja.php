<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cc = $_POST['cc'];
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $cargo = $_POST['cargo'];
  $experiencia = $_POST['experiencia'];
  $mensaje = $_POST['mensaje'];

  $sql = "INSERT INTO trabaja (cc, nombre, email, telefono, cargo, experiencia, mensaje)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "sssssss", $cc, $nombre, $email, $telefono, $cargo, $experiencia, $mensaje);

  if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('¡Formulario enviado correctamente!');window.location.href='../pages/Trabaja.html';</script>";
  } else {
    echo "Error: " . mysqli_error($conexion);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conexion);
} else {
  echo "Método no permitido";
}
?>