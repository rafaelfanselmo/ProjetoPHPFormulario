<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
/*
Validações
Funções (filter_input = filter_var)
FILTER_VALIDATE_INT
FILTER_VALIDATE_EMAIL
FILTER_VALIDATE_FLOAT
FILTER_VALIDATE_IP
FILTER_VALIDATE_URL

FILTER_SANITIZE_SPECIAL_CHARS
FILTER_SANITIZE_INT
FILTER_SANITIZE_EMAIL
FILTER_SANITIZE_URL
*/
?>

<?php 

if(isset($_POST['enviar-formulario'])) {
	/*echo "Enviou <br>";
	echo var_dump($_POST);*/
	$erros = array();
	
	/* validação de campo
	if ($idade = filter_input(INPUT_POST, 'idade',FILTER_VALIDATE_INT)) {
		echo "é um inteiro";
	}*/
    /* validação invertida*/
	if (!$idade = filter_input(INPUT_POST, 'idade',FILTER_VALIDATE_INT)) {
		$erros[] = "Idade Precisa ser um valor inteiro";
	}

	if (!$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL)) {
		$erros[] = "Email inválido";
	}

	if (!$peso = filter_input(INPUT_POST, 'peso',FILTER_VALIDATE_FLOAT)) {
		$erros[] = "Peso Precisa ser um Float";
	}

	if (!$ip = filter_input(INPUT_POST, 'ip',FILTER_VALIDATE_IP)) {
		$erros[] = "IP inválido";
	}

	if (!$url = filter_input(INPUT_POST, 'url',FILTER_VALIDATE_URL)) {
		$erros[] = "URL inválida";
	}

	if(!empty($erros)){
		foreach ($erros as $erro) {
			echo "<li> $erro </li>";
		}
	}else{
		echo "Seus dados estão corretor";
	}
}

?>

<!--

	EXEMPLO UTILIZADO NOS FILTROS

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		Idade: <input type="text" name="idade"><br> <br>
		Email:<input type="text" name="email"><br> <br>
		Peso:<input type="text" name="peso"><br> <br>
		IP:<input type="text" name="ip"><br> <br>
		URL:<input type="text" name="url"><br> <br>
		<button type="submit" name="enviar-formulario">Enviar</button>
	</form>
-->




<!-- 
	TESTE VARIAVEIS GLOBAIS POST 
	<form action="dados.php" method="POST">
		Nome: <input type="text" name="nome"><br> <br>
		Email:<input type="email" name="email"><br> <br>
		<input type="submit" name="Enviar">
		
	</form>
-->
<!--
	TESTE VARIAVEIS GLOBAIS GET
    <form action="dados.php" method="GET">
		Nome: <input type="text" name="nome"><br> <br>
		Email:<input type="email" name="email"><br> <br>
		<input type="submit" name="Enviar">
	</form>
-->
<!-- 
TESTE VARIAVEIS GLOBAIS GET VIA LINK

	<a href="dados.php?idade=37&sobrenome=Anselmo">Enviar Dados</a>
-->
</body>
</html>