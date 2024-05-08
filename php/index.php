<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require('classes.php');
    if( $_POST["login"] == 'vestibular' and $_POST["senha"] == 'fatec') {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION["username"] = 'cadastro';
        header("Location: home.php");
        exit();
    } else {
        echo "Credenciais inválidas. Por favor, tente novamente.";
        $_SESSION['loggedin'] = FALSE;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" placeholder="Insira seu login" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" placeholder="Insira sua senha" required><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
