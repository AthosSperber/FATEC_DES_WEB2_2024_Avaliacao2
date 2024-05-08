<?php
include 'header.php';
require('classes.php');

if(isset($_SESSION['loggedin'])) {
    $cadastro = new Cadastro();
    $candidatos = $cadastro->listarCandidatos();
    if($candidatos) {
        foreach($candidatos as $candidato) {
            echo "Nome: " . $candidato['nome'] . " - Curso: " . ($candidato['curso'] == 1 ? "DSM" : "GE") . "<br>";
        }
    } else {
        echo "Nenhum candidato cadastrado.";
    }
} else {
    echo "Faça login para acessar esta funcionalidade.";
}
?>
