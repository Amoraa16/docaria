<?php
session_start();
include 'includes/header.php';
?>

<?php if (isset($_SESSION['usuario'])): ?>
  <p>Olá, <?php echo $_SESSION['usuario']; ?>!</p>

  
<div class="carousel-images-container">
    <button class="carousel-images-btn carousel-images-prev">&#10094;</button>
    <div class="carousel-images-track">
        <div class="carousel-images-item"><img src="imagens/bolo1.jpg" alt="Bolo de Chocolate"></div>
        <div class="carousel-images-item"><img src="imagens/bolo2.jpg" alt="Bolo de Cenoura"></div>
        <div class="carousel-images-item"><img src="imagens/torta.jpg" alt="Torta de Morango"></div>
        <div class="carousel-images-item"><img src="imagens/torta2.jpg" alt="Torta de Limão"></div>
        <div class="carousel-images-item"><img src="imagens/brigadeiro.jpg" alt="Brigadeiro"></div>
        <div class="carousel-images-item"><img src="imagens/beijinho.jpg" alt="Beijinho"></div>
    </div>
    <button class="carousel-images-btn carousel-images-next">&#10095;</button>
</div>

<script>
const carouselTrack = document.querySelector('.carousel-images-track');
const prevBtn = document.querySelector('.carousel-images-prev');
const nextBtn = document.querySelector('.carousel-images-next');

// Largura do card considerando o margin
const itemWidth = carouselTrack.querySelector('.carousel-images-item').offsetWidth + 20;

nextBtn.addEventListener('click', () => {
    carouselTrack.scrollBy({ left: itemWidth, behavior: 'smooth' });
});

prevBtn.addEventListener('click', () => {
    carouselTrack.scrollBy({ left: -itemWidth, behavior: 'smooth' });
});
</script>

  <a href="pages/produtos.php" class="botao">Ver Produtos</a>
  <a href="pages/logout.php" class="botao">Sair</a>
<?php else: ?>
  <div class="login-area">
    <h2>Área do Cliente</h2>
    <a href="pages/login.php" class="botao">Entrar</a>
    <a href="pages/cadastro.php" class="botao">Cadastre-se</a>
  </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
