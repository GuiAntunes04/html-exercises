<?php

// Recebe o valor de n pela URL
$n = $_GET["n"] ?? 0;

// Garante que seja um número inteiro positivo
$n = filter_var($n, FILTER_VALIDATE_INT);

if ($n === false || $n < 0) {
    $n = 0;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página HTML dinâmica</title>
</head>
<body>

<h1>Página HTML dinâmica</h1>
<h2>Utilize "?n=i" ao final da URL, Sendo i = número natural não nulo.</h2>

<?php
for ($i = 0; $i < $n; $i++) {
    echo "<p>Programação para Internet</p>";
}
?>

</body>
</html>