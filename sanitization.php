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

SANITIZAÇÃO

FILTER_SANITIZE_SPECIAL_CHARS
FILTER_SANITIZE_INT
FILTER_SANITIZE_EMAIL
FILTER_SANITIZE_URL
*/
?>

<?php 

if(isset($_POST['enviar-formulario'])) {
	//Array com erros
	$erros = array();

	//sanitize
	$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);
	

	$idade = filter_input(INPUT_POST, 'idade',FILTER_SANITIZE_NUMBER_INT);
	if (!filter_var($idade,FILTER_VALIDATE_INT)) {
		$erros[] = "Idade precisa ser um inteiro";
	}

	$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$erros[] = "Email precisa ser válido";
	}
	
	$url = filter_input(INPUT_POST, 'url',FILTER_SANITIZE_URL);
	if (!filter_var($url,FILTER_VALIDATE_URL)) {
		$erros[] = "URL inválida";
	}
	
}

	if(!empty($erros)){
		foreach ($erros as $erro) {
			echo "<li> $erro </li>";
		}
	}else{
		echo "Seus dados estão corretor";
	}


?>

<!--
	EXEMPLO UTILIZADO NOS FILTROS
-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		Nome:<input type="text" name="nome"><br> <br>
		Idade: <input type="text" name="idade"><br> <br>
		Email:<input type="text" name="email"><br> <br>
		URL:<input type="text" name="url"><br> <br>
		<button type="submit" name="enviar-formulario">Enviar</button>
	</form>

</body>
</html>