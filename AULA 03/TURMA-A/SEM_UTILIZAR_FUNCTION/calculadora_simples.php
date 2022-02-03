<?php 
	//Declaração de variáveis
	$valor1 = (double) 0;
	$valor2 = (double) 0;
	$resultado = (double) 0;
	$opcao = (string) null;


	/*
		gettype() - permite verificar qual o tipo de dados de uma variavel
		settype() - permite modificar o tipo de dados de uma variavel
	*/
	/*	Exemplo de uma variavel que nasce do tipo inteiro e depois é 
				convertida para string

		$nome = 10;
		echo(gettype($nome));

		settype($nome, "string");

		echo(gettype($nome));

		strtoupper() - permite converter um texto para MAIUSCULO
		strtolower() - permite converter um texto para minusculo
		
	*/

	//Validação para verificar se o botão foi clicado
	if(isset($_POST['btncalc']))
	{
		//Recebe os dados do formulário
		$valor1 = $_POST['txtn1'];
		$valor2 = $_POST['txtn2'];
		
		//Validação de tratamento de erro para caixa vazia
		if($_POST['txtn1'] == "" || $_POST['txtn2'] == "" )
			echo('<script> alert("Favor preencher todas as caixas!"); </script>');
		else
		{
			//Validação de tratamento de erro para rdo sem escolha
			if(!isset($_POST['rdocalc']))
				echo('<script> alert("Favor escolher uma operação válida"); </script>');
			else
			{
				//Validação para tratamento de erro para dados incorreto
				if(!is_numeric($valor1) || !is_numeric($valor2))
					echo('<script> alert("Não é possível realizar calculos de dados não numericos!"); </script>');
				else
				{
					//apenas podemos receber o valor do rdo quando ele existir
					$opcao = strtoupper($_POST['rdocalc']);
					switch ($opcao)
					{
						case "SOMAR":
							$resultado = $valor1 + $valor2;
							break;
						case "SUBTRAIR":
							$resultado = $valor1 - $valor2;
							break;
						case "MULTIPLICAR":
							$resultado = $valor1 * $valor2;
							break;
						case "DIVIDIR":
							if($valor2 == 0)
								echo('<script> alert("Não é possível realizar divisão, onde o valor 2 é igual a 0!"); </script>');
							else
								$resultado = $valor1 / $valor2;

							break;
						
						default:
							//Processamento caso não entre em nenhuma das opções
					}

					// //Processamento do ccalculo das operações
					// if($opcao == 'SOMAR')
					// 	$resultado = $valor1 + $valor2;
					// elseif ($opcao == 'SUBTRAIR') 
					// 	$resultado = $valor1 - $valor2;
					// elseif ($opcao == 'MULTIPLICAR')
					// 	$resultado = $valor1 * $valor2;
					// elseif ($opcao == 'DIVIDIR')
					// {
					// 	//Validação para tratamento de erro da divisão por 0
					// 	if($valor2 == 0)
					// 		echo('<script> alert("Não é possível realizar divisão, onde o valor 2 é igual a 0!"); </script>');
					// 	else
					// 		$resultado = $valor1 / $valor2;
					// }

					//round() - permite limitar a qtde de casas decimais de um valor, além 
					//de arredondar o valor quando necessário
					$resultado = round($resultado, 2);

					// number_format() = permite limitar a qtde de casas decimais de um valor, além 
					//de arredondar o valor quando necessário
					//$resultado = number_format($resultado, 2);

				}
			}
		}
	}


?>
<html>
    <head>
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="post" action="calculadora_simples.php">
						Valor 1:<input type="text" name="txtn1" value="<?=$valor1;?>" > <br>
						Valor 2:<input type="text" name="txtn2" value="<?=$valor2;?>" > <br>
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar" <?=$opcao == 'SOMAR'?'checked':null;?> >Somar <br>
							<input type="radio" name="rdocalc" value="subtrair" <?=$opcao == 'SUBTRAIR'?'checked':null;?> >Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar" <?=$opcao == 'MULTIPLICAR'?'checked':null;?> >Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" <?=$opcao == 'DIVIDIR'?'checked':null;?>>Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
						<?=$resultado;?>
						</div>
						
					</form>
            </div>
           
        </div>
        
		
	</body>

</html>

