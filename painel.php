<?php 


//inicia a sessão no ficheiro
session_start();

//para o estado do carro
$valor = file_get_contents("api/files/estado/valor.txt");


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
	<meta charset="UTF-8">

	<!-- Página faz refresh de 10 em 10 segundos-->
	<meta http-equiv="refresh" content="10">

	<!-- Referência ao ficheiro css utlizado -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Css2.css">

	<!-- Título da página -->
	<title>allEletric Painel de Controlo</title>

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

	<br>

	<div class="container">
		<div class="card">

			<!-- Alternativa ao jumbotron -->
			<div class="class-header p-3 mb-2 bg-danger text-dark"> <b>Painel de Controlo</b></div>
			
			<div class="card-body" >
				<table class="table">
					<!-- Cria o table header -->
					<thead>
						<tr>
							<th scope="col">Informação: </th>
							<th scope="col"> </th>
							<th scope="col">Estado</th>
						</tr>
					</thead>
					<!-- Fim  do table header -->
					<tbody>
						<tr>
							<!--Apresenta a informação do estado do carro - se está ou não destrancado -->
							<td>Estado do Carro</td>
							<td> </td>
							<?php if($valor==0){ //está destrancado
								echo "<td><span class='badge badge-pill badge-success' style='text-align:center'>Destrancado</span></td>";
								
							}else
							{
								echo "<td><span class='badge badge-pill badge-danger'>Trancado</span></td>";

							}
							?> 
							
							
							
						</tr>
						<tr>
							<td>Modelo do carro</td>
							<td> </td>
							<td>X Æ A-06</td>
							
							
						</tr>
						<tr>
							<td>Matrícula</td>
							<td> </td>
							<td>ZK 62 KL</td>
							
						</tr>

						<tr>
							<td>Ano de fabrico</td>
							<td> </td>
							<td>2019</td>	
						</tr>

					</tbody>
				</table>
			</div>		
		</div>
	</div>
	
	<!-- JavaScript para fazer com que a animação do dropdown funcione -->
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