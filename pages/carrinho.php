<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include '../includes/header.php';
include '../includes/funcoes.php';

if (isset($_POST['comprar'])) {
    if (!empty($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = []; 
        $msg = "Compra finalizada com sucesso! Obrigado por comprar na Doçaria Amorim 🍰";
    } else {
        $msg = "Seu carrinho está vazio.";
    }
}

if (isset($_GET['remover'])) {
    removerDoCarrinho($_GET['remover']);
    header("Location: carrinho.php");
    exit();
}

$total = 0;
?>

<h2>Seu Carrinho</h2>
<?php if (isset($msg)): ?>
  <p style="color: green; text-align: center;"><?php echo $msg; ?></p>
<?php endif; ?>

<?php if (empty($_SESSION['carrinho'])): ?>
  <p>O carrinho está vazio 😢</p>
<?php else: ?>
  <table style="margin: auto; border-collapse: collapse; background: #fff0f5;">
    <tr>
      <th style="padding: 10px;">Produto</th>
      <th style="padding: 10px;">Qtd</th>
      <th style="padding: 10px;">Preço</th>
      <th style="padding: 10px;">Subtotal</th>
      <th></th>
    </tr>
    <?php
    foreach ($_SESSION['carrinho'] as $id => $qtd) {
      $res = $conn->query("SELECT * FROM produtos WHERE id = $id");
      $prod = $res->fetch_assoc();
      $subtotal = $prod['preco'] * $qtd;
      $total += $subtotal;
    ?>
    <tr>
      <td style="padding: 10px;"><?php echo $prod['nome']; ?></td>
      <td style="padding: 10px;"><?php echo $qtd; ?></td>
      <td style="padding: 10px;">R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></td>
      <td style="padding: 10px;">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
      <td style="padding: 10px;">
        <a href="carrinho.php?remover=<?php echo $id; ?>">❌</a>
      </td>
    </tr>
    <?php } ?>
  </table>

  <h3>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>
<div class="finalizar-container">
  <form method="POST" action="">
    <button type="submit" name="comprar" class="botao">✅ Finalizar Compra</button>
  </form>
</div>

  <a href="../index.php" class="botao">Continuar comprando</a>
<?php endif; ?>


<?php include '../includes/footer.php'; ?>
