<?php 
// Dados a autenticação dos utilizadores
//$_SESSION["username"] = "andre" ou "micael" ou "carro"
//$_SESSION["password"] = "1234"  ou "leiria" ou "carro"



//para a temperatura
$valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
$nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");
//fim das variaveis da temperatura

//para a bateria
$valor_bateria = file_get_contents("api/files/bateria/valor.txt");
$hora_bateria = file_get_contents("api/files/bateria/hora.txt");
$nome_bateria = file_get_contents("api/files/bateria/nome.txt");
//fim das variaveis da bateria

//para as portas 
$valor_portas = file_get_contents("api/files/portas/valor.txt");
$hora_portas = file_get_contents("api/files/portas/hora.txt");
$nome_portas = file_get_contents("api/files/portas/nome.txt");
//fim das variaveis das portas 

//para a humidade
$valor_humidade = file_get_contents("api/files/humidade/valor.txt");
$hora_humidade = file_get_contents("api/files/humidade/hora.txt");
$nome_humidade = file_get_contents("api/files/humidade/nome.txt");
//fim das variaveis da humidade

//para a proximidade
$valor_proximidade = file_get_contents("api/files/proximidade/valor.txt");
$hora_proximidade = file_get_contents("api/files/proximidade/hora.txt");
$nome_proximidade = file_get_contents("api/files/proximidade/nome.txt");
//fim das variaveis da proximidade

//para a luminosidade
$valor_luminosidade = file_get_contents("api/files/luminosidade/valor.txt");
$hora_luminosidade = file_get_contents("api/files/luminosidade/hora.txt");
$nome_luminosidade = file_get_contents("api/files/luminosidade/nome.txt");
//fim das variaveis da luminosidade

//inicia a sessão no ficheiro
session_start();

//condição para impedir que se aceda ao ficheiro sem antes ter efetuado o login
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

	<!-- Titulo da página -->
	<title>allEletric Home</title>

	<!-- Referência ao ficheiro css utlizado -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Css2.css">
	
	<!-- links para o Dropdown usando javascript -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Fim das referencias aos links do dropdown-->

	


</head>

<body>
	<!-- Navbar -->
	<?php include('navbar.php'); ?>

	<!-- jumbotron da dashboard -->
	<div class="jumbotron">
		<?php if($utilizador != "carro"){  echo "<h1 class='text-center' style='font-weight: bold'>Bem-vindo,". $_SESSION['username']. "</h1>";} else { echo "<h1 class='text-center' style='font-weight: bold'> Modo Visualização </h1>";}?>
		<!--<h1 class="text-center" style="font-weight: bold">Bem-vindo, <?php echo $_SESSION['username'] ?></h1> -->
		<!--<p class="text-center">Aqui pode ver todas as informações sobre o seu carro elétrico</p> -->
	</div>

	<!-- Início do carousel slide -->
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="background-color: grey">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		</ol>

		<!-- Inicio dos tabs do carousel slide-->
		<div class="carousel-inner" >
			
			<!-- Primeiro "tab" do carousel slide -->
			<div class="carousel-item active">
				<!-- imagem em branco para colocar as dimensões pretendidas-->
				<img src="quadrado.png" class="d-block" alt="error">
				<!-- div para colocar o texto no carousel slide -->
				<div class="carousel-caption d-none d-md-block">
					<h5 style="color: red"><b>allEletric</b></h5>
					<p>Muito mais do que um simples meio de transporte</p>
				</div>
			</div>
			<!-- Fim do primeiro "tab" do carousel slide-->
			
			<!-- Segundo "tab" do carousel slide -->
			<div class="carousel-item">
				<!-- imagem em branco para colocar as dimensões pretendidas-->
				<img src="quadrado.png" class="d-block" alt="error">
				<!-- div para colocar o texto no carousel slide -->
				<div class="carousel-caption d-none d-md-block">
					<p>Aqui pode ver todas as informações sobre o seu carro elétrico</p>
					
				</div>
			</div>
			<!-- Fim do segundo "tab" do carousel slide -->

			<!-- Terceiro "tab" do carousel slide -->
			<div class="carousel-item">
				<!-- imagem em branco para colocar as dimensões pretendidas-->
				<img src="quadrado.png" class="d-block" alt="error">
				<!-- div para colocar o texto no carousel slide -->
				<div class="carousel-caption d-none d-md-block">
					<p>Mais novidades em breve...</p>
				</div>
			</div>
			<!-- Fim do terceiro "tab" do carousel slide -->
		</div>
		<!-- Fim dos tabs do carousel slide -->

		<!-- botão para ir para o carousel slide anterior ao atual -->
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>

		<!-- botão para ir para o carousel slide posterior ao atual-->
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<br>
	<!-- Fim do carousel slide -->

	<!-- início dos cards -->
	<div class="container-fluid text-center container-sm">
		<div class="row">
			<!-- divide na horizontal a página em 3 divisões de dimensão 4, em "small" -->

			<!-- inicio da primeira divisão -->
			<div class="col-sm-4">
				<div class="card border-danger mb-3" >
					<div class="card-body">
						<h5 class="card-title">Bateria: <?php echo $valor_bateria?> % </h5>
						<p class="card-text">Kms restantes: <?php echo ($valor_bateria*300)/100?>km</p>
						<img src="bateria.png" alt="icon da bateria">
						<p class="card-text">Última atualização do sensor a <?php echo $hora_bateria?></p>
					</div>
				</div>
			</div>
			<!-- fim da primeira divisão -->

			<!-- inicio da segunda divisão -->
			<div class="col-sm-4">
				<div class="card border-danger mb-3" >
					<div class="card-body">
						<h5 class="card-title">Luminosidade: <?php echo $valor_luminosidade?></h5>
						<img src="light.png" alt="icon da luminosidade">
						<p class="card-text">Última atualização do sensor a <?php echo $hora_luminosidade?></p>
					</div>
				</div>
			</div>
			<!-- fim da segunda divisão -->

			<!-- inicio da terceira divisão -->
			<div class="col-sm-4">
				<div class="card border-danger mb-3" >
					<div class="card-body">
						<h5 class="card-title">Temperatura: <?php echo $valor_temperatura?> ºC</h5>
						<img src="temperatura.png" alt="icon da temperatura">
						<p class="card-text">Última atualização do sensor a <?php echo $hora_temperatura?></p>
					</div>
				</div>
			</div>
			<!-- fim da terceira divisão -->

		</div>


	</div>	
	<!-- fim do primeiro set de cards -->

	<br>

	<!-- início do segundo set de cards -->
	<div class="container-fluid text-center container-sm">
		<div class="row">	
			<!-- divide na horizontal a página em 3 divisões de dimensão 4, em "small" -->

			<!-- inicio da primeira divisão -->
			<div class="col-sm-4">
				<div class="card border-danger mb-3" >
					<div class="card-body">
						<h5 class="card-title">Portas abertas: <?php echo $valor_portas ?></h5>
						<img src="door.png" alt="icon da porta">
						<p class="card-text">Última atualização do sensor a <?php echo $hora_portas ?></p>
					</div>
				</div>
			</div>
			<!-- fim da primeira divisão -->

			<!-- inicio da segunda divisão -->
			<div class="col-sm-4">
				<div class="card border-danger mb-3" >
					<div class="card-body">
						<h5 class="card-title">Humidade: <?php echo $valor_humidade ?> %</h5>
						<img src="humidade.png" alt="icon da humidade">
						<p class="card-text">Última atualização do sensor a <?php echo $hora_humidade ?></p>
					</div>
				</div>
			</div>
			<!-- fim da segunda divisão -->

			<!-- inicio da terceira divisão -->
			<div class="col-sm-4">
				<div class="card border-danger mb-3" >
					<div class="card-body">
						<h5 class="card-title"><?php echo $valor_proximidade ?> </h5>
						<img src="proximidade.png" alt="icon da proximidade">
						<p class="card-text">Última atualização do sensor a <?php echo $hora_proximidade ?> </p>  <!-- - <a href="#">Histórico</a> -->
					</div>
				</div>
			</div>
			<!-- fim da terceira divisão -->
			<div class="col-sm-12">
				<div class="card border-danger mb-3" >
					<div class="card-body">
						<?php 
            //PARA CONTAR QUANTOS FICHEIROS ESTÃO NA DIRETORIA
						$directory = "uploads/";
						$filecount = 0;
            //vai à path dos uploads, com a função glob, obtem um array com cada ficheiro que existe nos uploads
						$files = glob($directory . "*");
						if ($files){
							$filecount = count($files)-1;
            	//se existirem ficheiros, e como começa a contar do zero, a última imagem que se fez upload tem o nome de webcam'nº ficheiros - 1'.png
						}?>

						<h5 class="card-title">Camera:</h5>
						<?php
						//vai mostrar apenas a última imagem que se fez upload
						echo "<img src='uploads/webcam".$filecount.".jpg' style='width:25%'>"; 
						?>
					</div>
					<!-- mostra a hora que foi tirada a última foto -->
					<div class="card-footer"><p>Atualização: <?php echo date("d-m-Y H:i:s",filemtime('uploads/webcam'.$filecount.'.jpg') ); ?> </p></div>


				</div>
			</div>

		</div>

	</div>
	<!-- fim dos cards-->

	<br>
	<!-- Dá espaçamento entre os diferentes elementos-->
	<br>

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