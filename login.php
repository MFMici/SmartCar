<?php 
	//para aceder -> http://127.0.0.1/projeto/login.php
session_start();

//credenciais de autenticação para o primeiro utilizador - o que tem mais permissões
$username1="Andre";
$password1="1234";

//credenciais de autenticação para o segundo utilizador
$username2="Micael";
$password2="leiria";

//credenciais de autenticação para o terceiro utilizador - o que tem menos permissões (apenas consegue visualizar alguns dados)
$username3="carro";
$password3="carro";

//verificar se as variáveis existem
if (isset($_POST['username']) && isset($_POST['password'])){
	//verificar se o login foi bem sucedido (password certa para o respetivo username)
	if( ($_POST['username'] != $username1 || $_POST['password'] != $password1) && ($_POST['username'] != $username2 || $_POST['password'] != $password2) && ($_POST['username'] != $username3 || $_POST['password'] != $password3)){
		echo "<div class='alert alert-danger alert-dismissible'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Credenciais erradas!</strong>
		</div>" ;
	}
	else{

		echo "<div class='alert alert-success alert-dismissible'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Sucesso!</strong> A redireccionar...
		</div>" ;
		$_SESSION['username'] = $_POST['username'];
		header('refresh:1; url=dashboard.php?opcao=dashboard');

	}
}

?>

<!-- Início da parte HTML -->
<!doctype html>

<html lang="en">

<head>
	<!-- Logótipo no separador -->
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

	<!-- definição da codificação dos caracteres utilizados -->
	<meta charset="utf-8">

	<!-- instruções para controlar as dimensões/scaling da página no browser -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Referência ao ficheiro css utlizado -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Css.css">

	<!-- Título da página -->
	<title>allEletric Car</title>

</head>

<body>
	<!-- container para introduzir as credenciais  -->
	<div class="container">
		<form class="formProj" method="post">
			<img src="alleletric.png" class="img-fluid" alt="Tesla image">
			<div class="form-group">
				<label for="username" id="usr">Username:</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Escreva o username" required>
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input name="password" type="password" class="form-control" id="pwd" placeholder="Escreva a password" required>
			</div>
			<input type="submit" class="btn btn-info" value="Submeter" style="background-color:#D6292B;">
		</form>
	</div>
	<!-- fim do container para introduzir as credenciais -->

	<!-- Início do footer -->
	<footer id="colophon" class="site-footer">
		<div class="social-wrapper">
			<a href="https://www.twitter.com" target="_blank">
				<img src="twitter.png" alt="Twitter Logo" class="twitter-icon">
			</a>
			<a href="https://www.instagram.com" target="_blank">
				<img src="instagram.png" alt="Instagram Logo" class="instagram-icon">
			</a>
			<a href="https://www.linkedin.com" target="_blank">
				<img src="linkedin.png" alt="Linkedin Logo" class="linkedin-icon">
			</a>
			<a href="https://www.facebook.com" target="_blank">
				<img src="facebook.png" alt="Facebook Logo" class="facebook-icon">
			</a>
			<a href="https://www.google.com" target="_blank">
				<img src="google.png" alt="Googleplus Logo" class="googleplus-icon">
			</a>
		</div>

		<nav class="footer-nav">
			<a>
				Copyright &copy; 2020 -
				<?php echo date("Y"); ?> allEletric. Todos os direitos reservados.
			</a>
				<!--<p style="text-align: right" > <a href="#top" >Back to top of page</a></p>-->
		</nav>
	</footer>
	<!-- fim do footer -->
</body>
</html>