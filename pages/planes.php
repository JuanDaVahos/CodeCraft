<?php
include '../db/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plan = $_POST['plan'];
  $precio = $_POST['precio'];
  $fecha_compra = date('Y-m-d H:i:s');
  $fecha_vencimiento = date('Y-m-d H:i:s', strtotime('+1 month'));

  $sql = "INSERT INTO contrato (plan, precio, fecha_compra, fecha_vencimiento)
            VALUES (?, ?, ?, ?)";

  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "ssss", $plan, $precio, $fecha_compra, $fecha_vencimiento);

  if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('¡Compra simulada correctamente!');window.location.href='planes.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conexion);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conexion);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles.css" />
  <link rel="icon" href="../src/VahosDev.webp" />
  <title>Planes, Precios y Servicios de CodeCraft</title>
  <meta name="description"
    content="CodeCraft te ofrece los mejores servicios al mejor precio | Prueba de la Universidad" />
  <script src="../js/index.js" defer></script>
</head>

<body>
  <header>
    <div class="headerDiv">
      <a href="../index.html">
        <img src="../src/Logo.webp" alt="Logo De CodeCraft" width="50px" hight="50px" />
      </a>
      <input type="checkbox" id="Menu" style="display: none" />
      <label class="iconMenu" for="Menu"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M4 6l16 0" />
          <path d="M4 12l16 0" />
          <path d="M4 18l16 0" />
        </svg>
      </label>
      <nav class="navbar">
        <ul>
          <a href="../index.html">Inicio</a>
          <a href="./planes.php">Planes y precios</a>
          <a href="./contactanos.html">Contactanos</a>
          <a href="./QuienesSomos.html">Quienes somos</a>
          <a href="./Trabaja.html">Trabaja con nosotros</a>
          <a href="./login.html">Iniciar sesión</a>
          <a href="#" id="logoutLink" style="display:none;">Cerrar sesión</a>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <section class="servisios">
      <article class="plan">
        <h3>Desarrollo Web</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-code">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M7 8l-4 4l4 4" />
          <path d="M17 8l4 4l-4 4" />
          <path d="M14 4l-4 16" />
        </svg>
        <p>
          Creamos sitios web personalizados y aplicaciones web que se adaptan
          a las necesidades de tu negocio.
        </p>
        <p>
          Perfecto para empresas pequeñas y medianas que buscan una presencia
          en línea efectiva.
        </p>
        <button class="openModal">Desde $999/mes</button>
      </article>
      <article class="plan">
        <h3>Desarrollo Móvil</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-brand-android">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M4 10l0 6" />
          <path d="M20 10l0 6" />
          <path d="M7 9h10v8a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-8a5 5 0 0 1 10 0" />
          <path d="M8 3l1 2" />
          <path d="M16 3l-1 2" />
          <path d="M9 18l0 3" />
          <path d="M15 18l0 3" />
        </svg>
        <p>
          Desarrollamos aplicaciones móviles nativas e hibridas para iOS y
          Android, brindando una experiencia fluida a tus usuarios.
        </p>
        <p>
          Perfecto para empresas que buscan expandir su alcance a través de
          dispositivos móviles.
        </p>
        <button class="openModal">Desde $1,499/mes</button>
      </article>
      <article class="plan">
        <h3>Consultoría IT</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 20h9" />
          <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
        </svg>
        <p>
          Asesoramiento experto en tecnología, estrategia digital y
          optimización de procesos IT para maximizar el rendimiento de tu
          empresa.
        </p>
        <p>
          Ideal para empresas que buscan mejorar su infraestructura
          tecnológica y procesos digitales.
        </p>
        <button class="openModal">Desde $799/sesión</button>
      </article>
      <article class="plan">
        <h3>Mantenimiento y Soporte</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path
            d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
        </svg>
        <p>
          Servicio continuo de mantenimiento, actualizaciones y soporte
          técnico para mantener tus aplicaciones funcionando de manera óptima.
        </p>
        <p>
          Perfecto para empresas que necesitan mantener sus sistemas
          actualizados y funcionando sin problemas.
        </p>
        <button class="openModal">Desde $599/mes</button>
      </article>
      <article class="plan">
        <h3>E-commerce Solutions</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-8 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
        </svg>
        <p>
          Desarrollo completo de tiendas online, integración de pasarelas de
          pago y sistemas de gestión de inventario.
        </p>
        <p>
          Ideal para negocios que quieren vender sus productos o servicios en
          línea.
        </p>
        <button class="openModal">Desde $1,799/mes</button>
      </article>
      <article class="plan">
        <h3>Desarrollo De Software Personalizado</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-code-dots">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 12h.01" />
          <path d="M12 12h.01" />
          <path d="M9 12h.01" />
          <path d="M6 19a2 2 0 0 1 -2 -2v-4l-1 -1l1 -1v-4a2 2 0 0 1 2 -2" />
          <path d="M18 19a2 2 0 0 0 2 -2v-4l1 -1l-1 -1v-4a2 2 0 0 0 -2 -2" />
        </svg>
        <p>
          Creamos soluciones de software personalizadas que se adaptan a tus
          necesidades específicas, optimizando tus procesos y aumentando tu
          eficiencia.
        </p>
        <p>
          Perfecto para empresas grandes que buscan una solución a medida para
          sus operaciones.
        </p>
        <button class="openModal">Desde $2,999/mes</button>
      </article>
    </section>
    <template id="planDialogTemplate">
      <dialog class="planDialog" closedby="any">
        <form method="post" action="planes.php" id="contratoForm">
          <h2>Contratar <span class="dialogPlanTitle"></span></h2>
          <input type="hidden" name="plan" class="inputPlan" />
          <input type="hidden" name="precio" class="inputPrecio" />
          <p>
            <strong>Precio:</strong> <span class="dialogPlanPrice"></span>
          </p>
          <p class="dialogPlanDescription"></p>
          <div class="dialogButtons">
            <button type="submit" class="dialogConfirm">
              Simular compra
            </button>
          </div>
          <form method="dialog">
            <button>
              Cancelar
            </button>
          </form>
          <p class="dialogNote">
            <strong>Nota:</strong> Este es un proyecto universitario. No se
            realizará ninguna contratación real.
          </p>
        </form>
      </dialog>
    </template>
  </main>
  <footer>
    <p>Hecho por <span>VahosDev</span></p>
    <p>Proyecto Ficticio De La Universidad</p>
  </footer>
  <script>
    function setupPlanDialogs() {
      const template = document.getElementById("planDialogTemplate");
      const planButtons = document.querySelectorAll(".openModal");

      planButtons.forEach((btn) => {
        btn.addEventListener("click", (e) => {
          const article = btn.closest(".plan");
          const planName = article.querySelector("h3").textContent;
          const planPrice = btn.textContent;
          const description = article.querySelectorAll("p")[0].textContent;

          const clone = template.content.cloneNode(true);
          const dialog = clone.querySelector("dialog");

          dialog.querySelector(".inputPlan").value = planName;
          dialog.querySelector(".inputPrecio").value = planPrice;

          dialog.querySelector(".dialogPlanTitle").textContent = planName;
          dialog.querySelector(".dialogPlanPrice").textContent = planPrice;
          dialog.querySelector(".dialogPlanDescription").textContent = description;

          dialog.addEventListener("close", () => {
            dialog.remove();
          });

          document.body.appendChild(dialog);
          dialog.showModal();
        });
      });
    }

    setupPlanDialogs();

    window.addEventListener("DOMContentLoaded", () => {
      // Busca el enlace de iniciar sesión por su href
      const loginLink = document.querySelector(
        'a[href="./login.html"]'
      );
      if (localStorage.getItem("logueado") === "1" && loginLink) {
        loginLink.style.display = "none";
      }
    });
  </script>
</body>

</html>