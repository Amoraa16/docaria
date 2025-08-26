let slides = document.querySelectorAll('.slide');
let index = 0;

function mostrarSlide() {
  slides.forEach((slide, i) => {
    slide.classList.remove('ativo');
    if (i === index) {
      slide.classList.add('ativo');
    }
  });

  index = (index + 1) % slides.length;
}

setInterval(mostrarSlide, 3000); // troca a cada 3 segundos
