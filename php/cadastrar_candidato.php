<?php
include 'header.php';
require('classes.php');

if(isset($_SESSION['loggedin'])) {
    if(isset($_POST['nome']) && isset($_POST['curso'])) {
        $cadastro = new Cadastro();
        $cadastro->cadastrarCandidato($_POST['nome'], $_POST['curso']);
        echo "Candidato cadastrado com sucesso!";
    } else {
        ?>
        <form method="POST" action="">
            Nome: <input type="text" name="nome"><br>
            Curso: <select name="curso">
                <option value="1">DSM</option>
                <option value="2">GE</option>
            </select><br>
            <input type="submit" value="Cadastrar">
        </form>
        <?php
    }
} else {
    echo "Faça login para acessar esta funcionalidade.";
}
?>
