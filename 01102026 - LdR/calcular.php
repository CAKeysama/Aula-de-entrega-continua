<?php

//ENTRADA

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operacao = $_POST['operacao'];

$operacoes = [
    'soma' => 'Soma',
    'subtracao' => 'Subtração',
    'multiplicacao' => 'Multiplicação',
    'divisao' => 'Divisão',
    'tabuada' => 'Tabuada',
];
$erro = $operacao === 'divisao' && (float) $num2 === 0.0;

//PROCESSAMENTO

switch ($operacao) {
    case 'soma':
        $resultado = $num1 + $num2;
        break;
    case 'subtracao':
        $resultado = $num1 - $num2;
        break;
    case 'multiplicacao':
        $resultado = $num1 * $num2;
        break;
    case 'divisao':
        $resultado = $erro
            ? 'Não é possível dividir por zero. Informe um divisor diferente de zero.'
            : $num1 / $num2;
        break;
    case 'tabuada':
        $resultado = '';
        for ($i = 1; $i <= 10; $i++) {
            $resultado .= "$num1 x $i = " . ($num1 * $i) . "\n";
        }
        $resultado = rtrim($resultado);
        break;
}

?>

<!-- SAÍDA -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta name="theme-color" content="#f5f7fa">
    <title>Resultado | Calculadora</title>
</head>
<body>
    <header class="topbar">
        <a class="brand" href="index.html" aria-label="Calculadora, página inicial">
            <span class="brand-mark" aria-hidden="true">C</span>
            <span>Calculadora</span>
        </a>
        <span class="topbar-caption">Ferramentas de cálculo</span>
    </header>

    <main class="page-shell result-shell">
        <section class="page-intro" aria-labelledby="page-title">
            <p class="eyebrow"><?= $erro ? 'CÁLCULO NÃO REALIZADO' : 'OPERAÇÃO CONCLUÍDA' ?></p>
            <h1 id="page-title"><?= $erro ? 'Revise os valores' : 'Seu resultado' ?></h1>
            <p class="intro-copy"><?= $erro ? 'O divisor precisa ser diferente de zero.' : 'Confira os detalhes da operação realizada.' ?></p>
        </section>

        <section class="calculator-panel result-panel<?= $erro ? ' is-error' : '' ?>" aria-label="Resultado do cálculo">
            <div class="result-label">
                <span class="status-mark" aria-hidden="true"><?= $erro ? '!' : '✓' ?></span>
                <div>
                    <p class="result-caption">Operação</p>
                    <h2><?= htmlspecialchars($operacoes[$operacao] ?? 'Operação', ENT_QUOTES, 'UTF-8') ?></h2>
                </div>
            </div>
            <output class="result-value" aria-live="polite"<?= $erro ? ' role="alert"' : '' ?>><?= htmlspecialchars((string) $resultado, ENT_QUOTES, 'UTF-8') ?></output>
            <a class="button button-primary" href="index.html">Nova operação <span aria-hidden="true">→</span></a>
        </section>
        <footer class="page-footer">Calculadora de operações <span aria-hidden="true">·</span> Uso simples e direto</footer>
    </main>
</body>
</html>
