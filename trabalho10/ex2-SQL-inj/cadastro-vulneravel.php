<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$telefone = $_POST["telefone"] ?? "";

try {

  /*
  CÓDIGO VULNERÁVEL

  Neste exemplo os dados digitados pelo usuário são inseridos
  diretamente dentro da string SQL. Assim, o conteúdo enviado
  pelo usuário passa a fazer parte da instrução executada pelo
  banco de dados, podendo alterar o comportamento da consulta.

  $sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES ('$nome', '$telefone');
  SQL;

  $pdo->exec($sql);
  */

  // CÓDIGO CORRIGIDO UTILIZANDO PREPARED STATEMENTS
  // A instrução SQL é preparada primeiro e os dados do usuário
  // são enviados separadamente, evitando que interfiram na
  // estrutura do comando SQL.

  $sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES (?, ?)
  SQL;

  $stmt = $pdo->prepare($sql);

  $stmt->execute([
    $nome,
    $telefone
  ]);

  header("location: mostra-alunos.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}