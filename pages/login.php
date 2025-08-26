<?php
session_start();
include 'includes/conexao.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])) {
      $_SESSION['usuario'] = $usuario['nome'];
      header("Location: produtos.php");
      exit();
    } else {
      $msg = "Senha incorreta!";
    }
  } else {
    $msg = "Usuário não encontrado!";
  }
}

include '../includes/header.php';
?>

<h2>Login</h2>
<form method="POST" action="" class="form-login">
  <input type="email" name="email" placeholder="E-mail" required><br><br>
  <input type="password" name="senha" placeholder="Senha" required><br><br>
  <button type="submit">Entrar</button>
</form>

<?php if ($msg != ""): ?>
  <p style="color: red; text-align:center;"><?php echo $msg; ?></p>
<?php endif; ?>




<?php include 'includes/footer.php'; ?>

