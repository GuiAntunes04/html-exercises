<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$estadoCivil = $_POST["estadoCivil"] ?? "";
$dataNascimento = $_POST["dataNascimento"] ?? "";
$funcao = $_POST["funcao"] ?? "";

// gera hash da senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

try {

$sql = <<<SQL
INSERT INTO funcionario
(nome, email, senhaHash, estadoCivil, dataNascimento, funcao)
VALUES (?, ?, ?, ?, ?, ?)
SQL;

$stmt = $pdo->prepare($sql);

$stmt->execute([
$nome,
$email,
$senhaHash,
$estadoCivil,
$dataNascimento,
$funcao
]);

header("location: lista-funcionarios.php");
exit();

}
catch (Exception $e) {
exit('Erro ao cadastrar funcionário: ' . $e->getMessage());
}