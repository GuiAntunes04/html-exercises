<?php

// Importa o arquivo responsável pela conexão com o banco de dados
require "../conexaoMysql.php";

// Cria a conexão com o banco usando PDO
$pdo = mysqlConnect();

try {
  // Define a consulta SQL que irá buscar nome e telefone da tabela aluno
  $sql = <<<SQL
    SELECT nome, telefone
    FROM aluno
  SQL;

  // Executa a consulta SQL no banco de dados
  // O resultado da consulta é armazenado no objeto $stmt
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  // Caso ocorra algum erro na execução da consulta,
  // o programa é interrompido e a mensagem de erro é exibida
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">

  <!-- Tag que permite responsividade em dispositivos móveis -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hello World - Listagem de Dados em Tabela do MySQL</title>

  <!-- Importa o CSS do Bootstrap para estilização da página -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
        crossorigin="anonymous">
</head>

<body>
  <div class="container">

    <!-- Título da página -->
    <h3>Dados na tabela <b>aluno</b></h3>

    <!-- Tabela estilizada usando Bootstrap -->
    <table class="table table-striped table-hover">
      <tr>
        <!-- Cabeçalho da tabela -->
        <th>Nome</th>
        <th>Telefone</th>
      </tr>

      <?php
      // Percorre cada linha retornada pela consulta ao banco
      while ($row = $stmt->fetch()) 
      {
        // Obtém o valor do campo nome
        // htmlspecialchars evita ataques XSS convertendo caracteres especiais
        $nome = htmlspecialchars($row['nome']);

        // Obtém o valor do campo telefone
        // Também usa htmlspecialchars para segurança
        $telefone = htmlspecialchars($row['telefone']);

        // Imprime uma linha da tabela com os dados do aluno
        echo <<<HTML
        <tr>
          <td>$nome</td> 
          <td>$telefone</td>
        </tr>      
        HTML;
      }
      ?>

    </table>

    <!-- Link para voltar ao menu principal -->
    <a href="../index.html">Menu de opções</a>
  </div>

</body>

</html>