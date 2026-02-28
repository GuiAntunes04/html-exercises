<?php
$arquivo = "dados.txt";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Cadastros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Lista de Cadastros</h2>

<table border="1" cellpadding="5">
<tr>
    <th>Nome</th>
    <th>CPF</th>
    <th>Email</th>
    <th>CEP</th>
    <th>Endereço</th>
    <th>Bairro</th>
    <th>Cidade</th>
    <th>Estado</th>
</tr>

<?php
if (file_exists($arquivo)) {
    $linhas = file($arquivo);

    foreach ($linhas as $linha) {
        $dados = explode(";", trim($linha));

        echo "<tr>";
        foreach ($dados as $indice => $campo) {
            if ($indice != 3) { // não mostra senha
                echo "<td>" . htmlspecialchars($campo) . "</td>";
            }
        }
        echo "</tr>";
    }
}
?>

</table>

</body>
</html>