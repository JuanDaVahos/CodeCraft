<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $asunto = $_POST['asunto'];
  $mensaje = $_POST['mensaje'];

  $sql = "INSERT INTO contactanos (nombre, email, asunto, mensaje)
            VALUES (?, ?, ?, ?)";

  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "ssss", $nombre, $email, $asunto, $mensaje);

  if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('¡Mensaje enviado correctamente!');window.location.href='../pages/contactanos.html';</script>";
  } else {
    echo "Error: " . mysqli_error($conexion);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conexion);
} else {
  echo "Método no permitido";
}
?>