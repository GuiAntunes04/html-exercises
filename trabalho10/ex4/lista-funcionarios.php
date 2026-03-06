<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

try {

$sql = <<<SQL
SELECT codigo, nome, email, estadoCivil, dataNascimento, funcao
FROM funcionario
SQL;

$stmt = $pdo->query($sql);

}
catch (Exception $e) {
exit('Erro ao buscar dados: ' . $e->getMessage());
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
<meta charset="utf-8">
<title>Funcionários</title>
</head>

<body>

<h2>Funcionários Cadastrados</h2>

<table border="1">

<tr>
<th>Código</th>
<th>Nome</th>
<th>Email</th>
<th>Estado Civil</th>
<th>Nascimento</th>
<th>Função</th>
</tr>

<?php
while ($row = $stmt->fetch()) {

$codigo = htmlspecialchars($row['codigo']);
$nome = htmlspecialchars($row['nome']);
$email = htmlspecialchars($row['email']);
$estadoCivil = htmlspecialchars($row['estadoCivil']);
$dataNascimento = htmlspecialchars($row['dataNascimento']);
$funcao = htmlspecialchars($row['funcao']);

echo <<<HTML
<tr>
<td>$codigo</td>
<td>$nome</td>
<td>$email</td>
<td>$estadoCivil</td>
<td>$dataNascimento</td>
<td>$funcao</td>
</tr>
HTML;

}
?>

</table>

</body>
</html>