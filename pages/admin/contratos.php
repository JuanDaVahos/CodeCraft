<?php
// filepath: c:\xampp\htdocs\CodeCraft\pages\admin\contratos.php
include '../../db/conexion.php';
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
  header('Location: ../login.html');
  exit;
}

// Consulta todos los contratos
$sql = "SELECT * FROM contrato ORDER BY fecha_compra DESC";
$result = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Contratos | Admin CodeCraft</title>
  <link rel="stylesheet" href="./admin.css">
  <style>
    body {
      background: #f5f6fa;
      font-family: 'Segoe UI', Arial, sans-serif;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 24px rgba(100, 156, 253, 0.10);
      padding: 32px;
    }

    h1 {
      color: #8244c4;
      margin-bottom: 24px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 18px;
    }

    th,
    td {
      padding: 10px 8px;
      border-bottom: 1px solid #eee;
      text-align: left;
    }

    th {
      background: #f0f4fa;
      color: #8244c4;
    }

    tr:last-child td {
      border-bottom: none;
    }

    .volver {
      display: inline-block;
      margin-top: 24px;
      color: #8244c4;
      text-decoration: none;
      font-weight: 500;
      border-radius: 6px;
      padding: 8px 18px;
      border: 1px solid #8244c4;
      transition: background 0.2s, color 0.2s;
    }

    .volver:hover {
      background: #8244c4;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Contratos Simulados</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Plan</th>
        <th>Precio</th>
        <th>Fecha de Compra</th>
        <th>Fecha de Vencimiento</th>
      </tr>
      <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['plan']); ?></td>
            <td><?php echo htmlspecialchars($row['precio']); ?></td>
            <td><?php echo htmlspecialchars($row['fecha_compra']); ?></td>
            <td><?php echo htmlspecialchars($row['fecha_vencimiento']); ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" style="text-align:center;">No hay contratos registrados.</td>
        </tr>
      <?php endif; ?>
    </table>
    <a href="admin.php" class="volver">Volver al panel</a>
  </div>
</body>

</html>
<?php
mysqli_close($conexion);