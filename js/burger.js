const navSlide = () => {
  const burger = document.querySelector(".navbar__burger");
  const nav = document.querySelector(".menu");
  const navLinks = document.querySelectorAll(".menu li");

  burger.addEventListener("click", () => {
    nav.classList.toggle("nav-active");

    //animate links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        link.style.animation = "";
      } else {
        link.style.animation = `fadeLinks 0.5s ease forwards ${
          index / 7 + 0.3
        }s`;
      }
    });

    //burger animation
    burger.classList.toggle("toggle");
  });
};

navSlide();
