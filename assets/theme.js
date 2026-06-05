const header = document.querySelector("[data-header]");
const navToggle = document.querySelector(".nav-toggle");
const navLinks = document.querySelectorAll(".nav-links a");

function syncHeader() {
  if (!header) {
    return;
  }

  header.classList.toggle("is-scrolled", window.scrollY > 12);
}

if (navToggle && header) {
  navToggle.addEventListener("click", () => {
    const isOpen = navToggle.getAttribute("aria-expanded") === "true";
    navToggle.setAttribute("aria-expanded", String(!isOpen));
    header.classList.toggle("menu-open", !isOpen);
  });
}

navLinks.forEach((link) => {
  link.addEventListener("click", () => {
    if (!navToggle || !header) {
      return;
    }

    navToggle.setAttribute("aria-expanded", "false");
    header.classList.remove("menu-open");
  });
});

syncHeader();
window.addEventListener("scroll", syncHeader, { passive: true });
