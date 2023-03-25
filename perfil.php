<?php

session_start();

if(!isset($_SESSION['username'])){
	header("refresh:3;url=login.php");
	die("Acesso restrito.");
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
	<!-- Logótipo no separador -->
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

	<!-- definição da codificação dos caracteres utilizados -->
	<meta charset="UTF-8">

	<!-- Página faz refresh de 15 em 15 segundos-->
	<meta http-equiv="refresh" content="15">

	<!-- Referência ao ficheiro css utlizado -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Css.css">

	<!-- links para o Dropdown usando javascript -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Fim das referencias aos links do dropdown-->

	<!-- Colocar o caminho do sensor/atuador que se está a ver o histórico -->
	<title> Perfil </title>

</head>

<body>
	<!-- Navbar -->
	<?php include('navbar.php'); ?>

	<!-- jumbotron da dashboard -->
	<div class="jumbotron">

	</div>

	<div class="container">
		<div class="card">

			<!-- Alternativa ao jumbotron -->
			<div class="class-header p-3 mb-2 bg-danger text-dark"> <b>O seu perfil:</b></div>
			
			<div class="card-body" >
				<table class="table">
					<!-- Cria o table header -->
					<thead>
						<tr>
							<th scope="col">Informação:</th>
						</tr>
					</thead>
					<!-- Fim  do table header -->
					<tbody>
						<!-- mostra a imagem do utilizador que fez login -->
						<?php echo "<img src='perfil/fotoPerfil".$_SESSION['username'].".jpg' alt='imagem de perfil' width='400' class='center'>"; ?>
						<h1 class="text-center" style="font-size:10px">
							<!-- formulário para fazer upload à foto de perfil -->
							<form action="uploadFoto.php" method="post" enctype="multipart/form-data">
								Select image to upload:
								<input type="file" name="imagem" id="imagem">
								<input type="submit" value="Upload Image" name="submit">

							</form>
						</h1>

						<?php if($_SESSION['username'] == "Micael"){
							echo "

							<tr>
							<!--Apresenta a informação das Portas -->
							<td>Nome:</td>
							<td> </td>
							<td>Micael</td>
							</tr>
							<tr>
							<!--Apresenta a informação das Portas -->
							<td>E-mail:</td>
							<td> </td>
							<td>2201743@my.ipleiria.pt</td>
							</tr>

							";
						}else{ //como só mostra o perfil.php aos utilizadores "Micael" e "Andre", neste else está garantido que o utilizador será o "Andre"
							echo "
							<tr>
							<!--Apresenta a informação das Portas -->
							<td>Nome:</td>
							<td> </td>
							<td>André</td>							
							</tr>
							<tr>
							<!--Apresenta a informação das Portas -->
							<td>E-mail:</td>
							<td> </td>
							<td>2201723@my.ipleiria.pt</td>
							</tr>

							";
						}
						?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	

	<!-- Início do footer -->
	<footer id="colophon" class="site-footer">
		<!-- Inicio das imagens com links para os websites-->
		<div class="social-wrapper">

			<!-- Link com imagem para o twitter -->
			<a href="https://www.twitter.com" target="_blank">
				<img src="twitter.png" alt="Twitter Logo" class="twitter-icon">
			</a>
			<!-- Fim do link com imagem para o twitter -->

			<!-- Link com imagem para o instagram -->
			<a href="https://www.instagram.com" target="_blank">
				<img src="instagram.png" alt="Instagram Logo" class="instagram-icon">
			</a>
			<!-- Fim do link com imagem para o instagram -->

			<!-- Link com imagem para o linkedin -->
			<a href="https://www.linkedin.com" target="_blank">
				<img src="linkedin.png" alt="Linkedin Logo" class="linkedin-icon">
			</a>
			<!-- Fim do link com imagem para o linkedin -->

			<!-- Link com imagem para o facebook -->
			<a href="https://www.facebook.com" target="_blank">
				<img src="facebook.png" alt="Facebook Logo" class="facebook-icon">
			</a>
			<!-- Fim do link com imagem para o facebook -->

			<!-- Link com imagem para o google plus -->
			<a href="https://www.google.com" target="_blank">
				<img src="google.png" alt="Googleplus Logo" class="googleplus-icon">
			</a>
			<!-- Fim do link com imagem para o google plus -->

		</div>

		<nav class="footer-nav">
			<!-- Informação com a criação da marca e o ano atual -->
			<a>
				Copyright &copy; 2020 -
				<?php echo date("Y"); ?> allEletric. Todos os direitos reservados.
			</a>
			<!-- Fim da informação -->
		</nav>

	</footer>
	<!--Fim do footer-->

	<!-- Inicio de código em JavaScript para o botão do histórico na navbar funcionar corretamente -->
	<script>
		$(document).ready(function(){
			$('.dropdown-submenu a.test').on("click", function(e){
				$(this).next('ul').toggle();
				e.stopPropagation();
				e.preventDefault();
			});
		});
	</script>
	<!-- Fim do código em JavaScript-->

</body>

</html>