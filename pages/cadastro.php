<?php
session_start();
include '../includes/conexao.php';
include '../includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

  $verifica = $conn->query("SELECT * FROM usuarios WHERE email = '$email'");
  if ($verifica->num_rows > 0) {
    $msg = "Email já cadastrado!";
  } else {
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    if ($conn->query($sql) === TRUE) {
      $msg = "Cadastro realizado com sucesso!";
    } else {
      $msg = "Erro: " . $conn->error;
    }
  }
}
?>

<h2>Cadastro de Usuário</h2>
<form method="POST" class="form-login">
  <input type="text" name="nome" placeholder="Nome completo" required><br><br>
  <input type="email" name="email" placeholder="E-mail" required><br><br>
  <input type="password" name="senha" placeholder="Senha" required><br><br>
  <button type="submit">Cadastrar</button>
</form>
<?php if (isset($msg)) echo "<p>$msg</p>"; ?>



<?php include '../includes/footer.php'; ?>

