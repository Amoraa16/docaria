<?php
session_start();

include '../includes/header.php';
include '../includes/funcoes.php';
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}



if (isset($_GET['add'])) {
  adicionarAoCarrinho($_GET['add']);
  header("Location: produtos.php");
  exit();
}
if (isset($_GET['avaliar'])) {
  avaliarProduto($conn, $_GET['avaliar']);
  header("Location: produtos.php");
  exit();
}


$result = $conn->query("SELECT * FROM produtos");
?>

<h2>Nossos Doces</h2>

<div class="carousel">
  <div class="carousel-track" id="carousel-track">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="carousel-item">
        <img src="../imagens/<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>">
        <h3><?php echo $row['nome']; ?></h3>
        <p><?php echo $row['descricao']; ?></p>
        <p><strong>R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></strong></p>
        <a class="botao" href="produtos.php?add=<?php echo $row['id']; ?>">Adicionar ao Carrinho</a><br><br>
        <a href="produtos.php?avaliar=<?php echo $row['id']; ?>">👍 Avaliar (<?php echo $row['avaliacao']; ?>)</a>
      </div>
    <?php endwhile; ?>
  </div>

  <div class="carousel-buttons">
    <button id="prevBtn">&#10094;</button>
    <button id="nextBtn">&#10095;</button>
  </div>
</div>

<script>
  const track = document.getElementById('carousel-track');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');

  let index = 0;
  const itemWidth = 270; 

  prevBtn.addEventListener('click', () => {
    index--;
    if (index < 0) index = track.children.length - 3;
    updateCarousel();
  });

  nextBtn.addEventListener('click', () => {
    index++;
    if (index > track.children.length - 3) index = 0;
    updateCarousel();
  });

  function updateCarousel() {
    track.style.transform = 'translateX(' + (-index * itemWidth) + 'px)';
  }
</script>


<div style="margin-top: 20px;">
  <a href="carrinho.php" class="botao">🛒 Ver Carrinho</a>
</div>

<?php include '../includes/footer.php'; ?>
