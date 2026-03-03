document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".nav-menu a");
  const sections = document.querySelectorAll("section[id]");

  function setActiveLink() {
    let currentSection = "";

   
    if (window.scrollY < 200) {
      currentSection = "Beranda";
    } else {
      sections.forEach((section) => {
        const sectionTop = section.offsetTop - 120;
        const sectionHeight = section.offsetHeight;

        if (
          window.scrollY >= sectionTop &&
          window.scrollY < sectionTop + sectionHeight
        ) {
          currentSection = section.getAttribute("id");
        }
      });
    }

    navLinks.forEach((link) => {
      link.classList.remove("active");
      if (link.getAttribute("href") === `#${currentSection}`) {
        link.classList.add("active");
      }
    });
  }

  window.addEventListener("scroll", setActiveLink);
  setActiveLink(); 
});

const menuBtn = document.querySelector(".menu");
const mobNav = document.querySelector(".mob-nav");
const links = document.querySelectorAll(".side-menu a");

// buka / tutup menu
menuBtn.addEventListener("click", () => {
  mobNav.classList.toggle("active");
});


// tutup menu saat klik link
links.forEach(link => {
  link.addEventListener("click", () => {
    mobNav.classList.remove("active");
  });
});

// auto tutup saat layar besar
window.addEventListener("resize", () => {
  if (window.innerWidth > 600) {
    mobNav.classList.remove("active");
  }
});
const btnHero = document.querySelector(".btn-hero");

function updateButtonText() {
  if (window.innerWidth <= 600) {
    btnHero.textContent = "Mulai";
  } else {
    btnHero.textContent = "Uji Coba Gratis 7 Hari →";
  }
}

updateButtonText();
window.addEventListener("resize", updateButtonText);