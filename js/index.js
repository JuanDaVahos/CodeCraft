const checkboxMenu = document.querySelector("#Menu");
const labelMenu = document.querySelector(".iconMenu");

labelMenu.addEventListener("click", () => {
  if (checkboxMenu.checked) {
    labelMenu.innerHTML = `
      <svg
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"
    >
      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
      <path d="M4 6l16 0" />
      <path d="M4 12l16 0" />
      <path d="M4 18l16 0" />
    </svg>`;
  } else {
    labelMenu.innerHTML = `
      <svg
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-menu-deep"
    >
      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
      <path d="M4 6h16" />
      <path d="M7 12h13" />
      <path d="M10 18h10" />
    </svg>`;
  }
});

window.addEventListener("DOMContentLoaded", () => {
  const loginLink = document.querySelector('a[href="./pages/login.html"]');
  const logoutLink = document.getElementById("logoutLink");
  if (localStorage.getItem("logueado") === "1") {
    if (loginLink) loginLink.style.display = "none";
    if (logoutLink) logoutLink.style.display = "inline-block";
  } else {
    if (logoutLink) logoutLink.style.display = "none";
  }

  if (logoutLink) {
    logoutLink.addEventListener("click", function (e) {
      e.preventDefault();
      localStorage.removeItem("logueado");
      location.reload();
      alert("Has cerrado sesión correctamente.");
    });
  }
});
