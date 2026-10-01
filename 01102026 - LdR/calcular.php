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
    <meta name="theme-color" content="#101010">
    <title><?= $erro ? 'Validação' : 'Relatório de processo' ?> | Cogitator CALC-01</title>
</head>
<body>
    <main class="crt-terminal<?= $erro ? ' terminal-error' : '' ?>" aria-labelledby="terminal-title">
        <header class="crt-header">
            <div>
                <p class="terminal-kicker">ADEPTUS MECHANICUS // COGITATOR INTERFACE</p>
                <h1 id="terminal-title">CALCULATION TERMINAL <span>NODE: CALC-01</span></h1>
            </div>
            <p class="terminal-version">LOCAL / ARITHMETIC CORE</p>
        </header>

        <section class="system-status" aria-label="Estado do terminal">
            <p class="section-prompt">&gt; PROCESS STATUS</p>
            <dl class="status-lines">
                <div><dt>SYSTEM</dt><dd><span class="state-ok">[ONLINE]</span></dd></div>
                <div><dt>OP-CODE</dt><dd><?= htmlspecialchars(strtoupper($operacao), ENT_QUOTES, 'UTF-8') ?></dd></div>
                <div><dt>ARITHMETIC CORE</dt><dd><span class="<?= $erro ? 'state-error' : 'state-ok' ?>">[<?= $erro ? 'INPUT ERROR' : 'COMPLETE' ?>]</span></dd></div>
            </dl>
        </section>

        <section class="boot-log" aria-label="Registro desta operação">
            <p><span class="prompt">&gt;</span> INPUT REGISTERS RECEIVED <span class="state-ok">[2]</span></p>
            <p><span class="prompt">&gt;</span> <?= $erro ? 'DIVISION HALTED: DIVISOR CANNOT BE ZERO' : 'ARITHMETIC PROCESS COMPLETE' ?> <span class="<?= $erro ? 'state-error' : 'state-ok' ?>">[<?= $erro ? 'ERROR' : 'OK' ?>]</span></p>
        </section>

        <section class="command-region result-region <?= $erro ? 'terminal-error' : '' ?>" aria-labelledby="report-title">
            <h2 class="section-prompt" id="report-title">&gt; DIAGNOSTIC REPORT</h2>
            <dl class="result-registers">
                <div><dt>REG-01 / Primeiro número</dt><dd><?= htmlspecialchars((string) $num1, ENT_QUOTES, 'UTF-8') ?></dd></div>
                <div><dt>REG-02 / Segundo número</dt><dd><?= htmlspecialchars((string) $num2, ENT_QUOTES, 'UTF-8') ?></dd></div>
                <div><dt>OP-CODE / Operação</dt><dd><?= htmlspecialchars($operacoes[$operacao] ?? 'Operação', ENT_QUOTES, 'UTF-8') ?></dd></div>
            </dl>
            <p class="output-label"><span class="prompt">&gt;</span> <?= $erro ? 'DIAGNOSTIC' : 'RESULT' ?>:</p>
            <output class="terminal-output" aria-live="polite"<?= $erro ? ' role="alert"' : '' ?>><?= htmlspecialchars((string) $resultado, ENT_QUOTES, 'UTF-8') ?></output>
            <p class="return-line"><a class="terminal-command" href="index.html">[ RETURN TO CALCULATOR ]</a></p>
        </section>

        <footer class="crt-footer">
            <span>CALC-01 / LOCAL COMPUTATION</span>
            <span>CORE STATUS: <?= $erro ? '<b class="state-error">INPUT REQUIRED</b>' : '<b class="state-ok">READY</b>' ?></span>
        </footer>
    </main>
</body>
</html>
