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

function setupPlanDialogs() {
  const template = document.getElementById("planDialogTemplate");
  const planButtons = document.querySelectorAll(".openModal");

  planButtons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const article = btn.closest(".plan");
      const planName = article.querySelector("h3").textContent;
      const planPrice = btn.textContent;
      const description = article.querySelector("p").textContent;

      const clone = template.content.cloneNode(true);
      const dialog = clone.querySelector("dialog");

      dialog.querySelector(".dialogPlanTitle").textContent = planName;
      dialog.querySelector(".dialogPlanPrice").textContent = planPrice;
      dialog.querySelector(".dialogPlanDescription").textContent = description;

      dialog.addEventListener("close", () => {
        dialog.remove();
        document.body.style.overflow = "";
      });

      dialog.addEventListener("show", () => {
        document.body.style.overflow = "hidden";
      });

      document.body.appendChild(dialog);
      dialog.showModal();
    });
  });
}

setupPlanDialogs();
