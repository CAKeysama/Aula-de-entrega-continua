<?php

//ENTRADA

if(isset($_POST['nome']) && isset($_POST['total']) && isset($_POST['idade'])) {
    $nome = $_POST['nome'];
    $total = $_POST['total'];
    $idade = $_POST['idade'];
} else {
    echo "Erro: Todos os campos são obrigatórios";
    exit;
}

$cartao = isset($_POST['cartao']) ? (float)$_POST['cartao'] : 0.0;



//PROCESSAMENTO

$desconto = $idade == 0 ? 0 : ($idade == 5 ? 5 : ($idade == 7 ? 7 : -1));

if ($desconto < 0) {
    echo "Erro: Faixa etária inválida";
    exit;
}

$desconto = $cartao == 1 ? $desconto + 5 : $desconto;
$totalFinal = $total - ($total * $desconto / 100);
$nomeSeguro = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
$totalFormatado = number_format((float)$totalFinal, 2, ',', '.');
$descontoTexto = $desconto . '%';
$cartaoTexto = $cartao == 1 ? 'Sim' : 'Não';

?>

<!-- SAIDA -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Paracetaloka | Pedido confirmado</title>
</head>
<body>
    <div class="page">
      <header class="topbar">
        <div class="logo" aria-hidden="true">+</div>
        <div class="brand">
          <h1>Farmácia Paracetaloka</h1>
          <p>Resumo do checkout</p>
        </div>
      </header>

      <main class="card">
        <div class="card-header">
          <h2>Pedido calculado</h2>
          <p>Confira o valor final com os descontos aplicados.</p>
        </div>
        <div class="receipt">
          <div class="receipt-row">
            <span>Cliente</span>
            <span><?php echo $nomeSeguro; ?></span>
          </div>
          <div class="receipt-row">
            <span>Cartão fidelidade</span>
            <span><?php echo $cartaoTexto; ?></span>
          </div>
          <div class="receipt-row">
            <span>Desconto total</span>
            <span><?php echo $descontoTexto; ?></span>
          </div>
          <div class="receipt-row">
            <span>Total a pagar</span>
            <strong>R$ <?php echo $totalFormatado; ?></strong>
          </div>
          <a class="back" href="indext.html">Voltar ao checkout</a>
        </div>
      </main>
    </div>
</body>
</html>