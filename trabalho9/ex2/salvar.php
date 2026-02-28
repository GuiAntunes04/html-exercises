<?php

$nome = $_POST["nome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$cep = $_POST["cep"] ?? "";
$endereco = $_POST["endereco"] ?? "";
$bairro = $_POST["bairro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";

/* Organiza os dados separados por ponto e vírgula */
$linha = "$nome;$cpf;$email;$senha;$cep;$endereco;$bairro;$cidade;$estado\n";

/* Salva no arquivo */
file_put_contents("dados.txt", $linha, FILE_APPEND);

/* Redireciona */
header("Location: listar.php");
exit;

?>