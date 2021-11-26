<?php

$mensagem = ''; //para substituir o echo dentro do if//
if($_POST){

$distancia = $_POST['distancia'];
$autonomia = $_POST['autonomia'];

if (is_numeric($distancia) && is_numeric($autonomia)) {

    if ($distancia > 0 && $autonomia > 0){
        $valorGasolina = 3.19;
        $valorEtanol = 4.81;
        $valorDiesel = 3.34;

        $calculoGasolina = ($distancia / $autonomia) * $valorGasolina;
        $calculoGasolina = number_format($calculoGasolina, 2, ',', '.'); // number_format é para coloca as casas decimais q vc deseja na aplicação//

        $calculoEtanol = ($distancia / $autonomia) * $valorEtanol;
        $calculoEtanol = number_format($calculoEtanol, 2, ',', '.'); // ',' é para dizer q o separador é a virgula ( , )//

        $calculoDiesel = ($distancia / $autonomia) * $valorDiesel;
        $calculoDiesel = number_format($calculoDiesel, 2, ',', '.'); 

        $mensagem.= "<div class='sucesso'>";
        $mensagem.= "O valor total gasto sera de: ";
        $mensagem.= "<ul>";
        $mensagem.= "<li><b>Gasolina: R$ </b>" .$calculoGasolina."</li>"; //aqui esta a substituição//
        $mensagem.= "<li><b>Etanol: R$ </b>" .$calculoEtanol."</li>";
        $mensagem.= "<li><b>Diesel: R$ </b>" .$calculoDiesel."</li>";

    }
    else{
        $mensagem.= "<div class= 'erro'>";
        $mensagem.= "<p> O valor da Distancia e da Autonomia deve ser maior que zero!.</p>";
        $mensagem.= "</div>";
    }
    }
    else{
        $mensagem.= "<div class= 'erro'>";
        $mensagem.= "<p> O valor recebido não é numérico.</p>";
        $mensagem.= "</div>";
    }
    }
    else{
        $mensagem.= "<div class= 'erro'>";
        $mensagem.= "<p>Nenhum dado foi recebido pelo Formulario.</p>";
        $mensagem.= "</div>";
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calculo de Consumo de Combustível</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<main>
		<div class="painel">
			<h2>Resultado do cálculo de consumo</h2>
			<div class="conteudo-painel">
				<?php
				echo $mensagem;
				?>
				<a class="botao" href="index.php">Voltar</a>
			</div>
		</div>
	</main>
</body>
</html>