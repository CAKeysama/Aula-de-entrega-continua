<?php
// Obter os dados (entrada)
$nome = $_POST['nome'];
$ano_nascimento = (int) $_POST['ano_nascimento'];
$ano_atual = (int) date('Y');

//processamento

$idade = $ano_atual - $ano_nascimento;
$dias_vividos = $idade * 365;
$horas_vividas = $dias_vividos * 24;
$minutos_vividos = $horas_vividas * 60;
$segundos_vividos = $minutos_vividos * 60;
$batidas_coracao = $minutos_vividos * 75;
$expectativa_vida = 90;
$batidas_restantes = ($expectativa_vida - $idade) * 365 * 24 * 60 * 75;
$respiradas = $minutos_vividos * 17;
$respiradas_restantes = ($expectativa_vida - $idade) * 365 * 24 * 60 * 17;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempo de Vida</title>
</head>
<body>
    <h1>Resultado do Cálculo</h1>
    <hr>
    <h2>Olá, <?php echo $nome; ?>! Você tem <?php echo $idade; ?> anos e já viveu aproximadamente 
        <?php echo number_format($dias_vividos,0,',','.'); ?> dias.</h2>
    <h3>Isso equivale a aproximadamente á <?php echo number_format($horas_vividas,0,',','.'); ?> horas, 
        <?php echo number_format($minutos_vividos,0,',','.'); ?> minutos e <?php echo number_format($segundos_vividos,0,',','.'); ?> segundos.</h3>
    
        <h3>Seu coração já bateu aproximadamente <?php echo number_format($batidas_coracao,0,',','.'); ?> vezes.</h3>

    <h3><?php if ($batidas_restantes < 0): ?>Você está fazendo hora extra na terra querido...
        <?php else: ?>Se você viver até os <?php echo $expectativa_vida; ?> anos, ainda terá aproximadamente 
        <?php echo number_format($batidas_restantes,0,',','.'); ?> batimentos cardíacos restantes.<?php endif; ?> </h3>
    
    
        <h3>Você já respirou aproximadamente <?php echo number_format($respiradas,0,',','.'); ?> vezes.</h3>

    <h3><?php if ($respiradas_restantes < 0): ?>Você está fazendo hora extra na terra querido...
        <?php else: ?>Se você viver até os <?php echo $expectativa_vida; ?> anos, ainda terá aproximadamente 
        <?php echo number_format($respiradas_restantes,0,',','.'); ?> respirações restantes.<?php endif; ?> </h3>
</body>
</html>