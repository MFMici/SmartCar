<?php

//coloca em variáveis os valores passados pelo URL
$sensor=$_REQUEST['sensor'];
$tipo=$_REQUEST['tipo'];

//coloca dentro de uma variavel o conteúdo do ficheiro log
$log = file_get_contents("api/files/".$sensor."/log.txt");

//converter o $log num string pois o 2º parametro do explode() necessita de ser uma string 
$logString = strval($log);
$linhas = explode("|", $logString); //1º elemento do vetor é o que está antes do primeiro "|", 2º elemento do vetor é o que está entre o primeiro "|" e o segundo "|" ...etc... (Divide os diferentes valores)

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
	<!-- links para o Dropdown funcionar-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<!-- Logótipo no separador -->
	<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
	
	<meta charset="UTF-8">

	<meta http-equiv="refresh" content="10"> <!--para fazer refresh de 10 em 10 seg-->

	<!-- Referência ao ficheiro css utilizado -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Css2.css">
	
	<!-- Colocar o caminho do sensor/atuador que se está a ver o histórico -->
	<?php echo "<title> Histórico/".$sensor."</title>" ?>
	
</head>



<body>
	<!-- inclui a navbar -->
	<?php include('navbar.php'); ?>

	<!-- separa a navbar do restante código -->
	<br>
	
	<!-- início do container utilizado para mostrar a tabela de atualizações do ficheiro log.txt do sensor/atuador selecionado -->
	<div class="container">

		<!-- divisão no inicío da página a mostrar informações sobre o sensor/atuador -->
		<div class="p-3 mb-2 bg-danger text-white">
			<!-- imagem do sensor/atuador em 64px -->
			<?php echo "<img style='float:right;' src='".$sensor."64.png'  alt='imagem do sensor/atuador'>" ?>
			<?php echo "<h1 class='text-left'>".$sensor."</h1>" ?>
			<!-- header para indicar o caminho utilizado no histórico (Histórico/Sensor ou Histórico/Atuador)-->
			<h6 class="text-left">Histórico/<?php echo $tipo?></h6>
		</div>

		<!-- Inicio da table -->
		<div class="card">
			<div class="card-header" style="font-weight: bold" >Atualizações - <?php echo $sensor ?> : </div>
			<div class="card-body" >
					<table class="table">
						<!-- Inicio do table header -->
						<thead>
							<tr>
								<th scope="col">Data de Atualização</th>
								<th scope="col">Valor</th>
							</tr>
						</thead>
						<!-- Fim do table header -->

						<!-- Inicio do table body-->
						<tbody>
							<?php
							// Para cada linha do ficheiro log, vai separar a hora do respetivo valor com o explode
							foreach ($linhas as $valores) {
								$separar = explode(";",$valores);
								$hora=$separar[0];
								//caso não tenha sido introduzido um valor, coloca-o a null
								if (!isset($separar[1])){
									$separar[1]= null;
								}
								$valor=$separar[1];

							// Cria uma entrada na tabela por cada Data e Valor encontrado
							echo 
							"<tr>
								<td>".$hora ."</td>
								<td>".$valor."</td>
							</tr>";
							}
						 	?>
						 	<!-- Fim do foreach e da criação de entradas na tabela-->

						</tbody>
						<!-- Fim do table body -->

					</table>
					<!-- Fim do table header-->
			</div>
		</div>

	</div>
	<!-- fim do container principal -->

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