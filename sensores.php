<?php 

//criação das variáveis para ir buscar os dados aos ficheiros

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

//para a whiteNoise
$valor_whiteNoise = file_get_contents("api/files/whiteNoise/valor.txt");
$hora_whiteNoise = file_get_contents("api/files/whiteNoise/hora.txt");
$nome_whiteNoise = file_get_contents("api/files/whiteNoise/nome.txt");
//fim das variaveis da whiteNoise


//para o CO2
$valor_CO2 = file_get_contents("api/files/CO2/valor.txt");
$hora_CO2 = file_get_contents("api/files/CO2/hora.txt");
$nome_CO2 = file_get_contents("api/files/CO2/nome.txt");
//fim das variaveis do CO2


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
	<meta http-equiv="refresh" content="10">

	<!-- Referência ao ficheiro css utlizado -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Css2.css">

	<!-- Título da página -->
	<title>allEletric Sensores</title>

	<!-- links para o Dropdown usando javascript -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Fim das referencias aos links do dropdown-->


</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
<body>
	
	<!-- Inclui a Navbar -->
	<?php include('navbar.php'); ?>

	<br>

	<div class="container">
		<div class="card">

			<!-- Alternativa ao jumbotron -->
			<div class="class-header p-3 mb-2 bg-danger text-dark"> <b>Tabela de Sensores</b></div>
			
			<div class="card-body" >
				<table class="table">

					<!-- Cria o table header -->
					<thead>
						<tr>
							<th scope="col">Tipo de Dispositivo IoT</th>
							<th scope="col">Valor</th>
							<th scope="col">Data de Atualização</th>
							<th scope="col">Estado Alertas</th>
						</tr>
					</thead>
					<!-- Fim  do table header -->

					<tbody>
						<tr>
							<!--Apresenta a informação da Bateria: valor e hora da ultima atualização -->
							<td>Bateria</td>
							<!-- Apresenta o valor da ultima atualização -->
							<td> <?php echo $valor_bateria?> %</td>
							<!-- Apresenta a hora da ultima atualização -->
							<td><?php echo $hora_bateria?></td>
							<!-- Dependendo do 'valor_bateria', muda o aspeto da mensagem do alerta -->
							<?php if($valor_bateria>75){
								echo "<td><span class='badge badge-pill badge-success'>Cheia</span></td>";
								
							}else
							{
								if($valor_bateria<=75 && $valor_bateria>30){
									echo "<td><span class='badge badge-pill badge-primary'>Normal</span></td>";
								}else
								echo "<td><span class='badge badge-pill badge-danger'>Baixo</span></td>";

							}
							?>
							<!-- Fim da informação sobre a bateria -->
							
						</tr>
						<tr>
							<!--Apresenta a informação da Luminosidade: valor e hora da ultima atualização -->
							<td>Luminosidade</td>
							<!-- Apresenta o valor da ultima atualização -->
							<td><?php echo $valor_luminosidade?></td>
							<!-- Apresenta a hora da ultima atualização -->
							<td><?php echo $hora_luminosidade?></td>
							<!-- Dependendo do 'valor_luminosidade', muda o aspeto da mensagem do alerta -->
							<?php if($valor_luminosidade=="Elevada"){
								echo "<td><span class='badge badge-pill badge-danger'>Alto</span></td>";
							}else{
								echo "<td><span class='badge badge-pill badge-success'>Baixo</span></td>";
							}
							?>
							<!-- Fim da informação sobre a luminosidade -->

						</tr>
						<tr>
							<!--Apresenta a informação da Temperatura: valor e hora da ultima atualização -->
							<td>Temperatura</td>
							<!-- Apresenta o valor da ultima atualização -->
							<td><?php echo $valor_temperatura?> ºC</td>
							<!-- Apresenta a hora da ultima atualização -->
							<td><?php echo $hora_temperatura?></td>
							<!-- Dependendo do 'valor_temperatura', muda o aspeto da mensagem do alerta -->
							<?php if($valor_temperatura>30){
								echo "<td><span class='badge badge-pill badge-danger'>Alto</span></td>";
							}else
							{
								if($valor_temperatura<=30 && $valor_temperatura>10){
									echo "<td><span class='badge badge-pill badge-success'>Normal</span></td>";
								}else
								echo "<td><span class='badge badge-pill badge-primary'>Baixo</span></td>";

							}
							?>
							<!-- Fim da informação sobre a temperatura -->

						</tr>
						<tr>
							<!--Apresenta a informação dos Pneus: valor e hora da ultima atualização -->
							<td>Humidade</td>
							<!-- Apresenta o valor da ultima atualização -->
							<td><?php echo $valor_humidade?> %</td>
							<!-- Apresenta a hora da ultima atualização -->
							<td><?php echo $hora_humidade?></td>
							<!-- Dependendo do 'valor_pneus', muda o aspeto da mensagem do alerta -->
							<?php if($valor_humidade>70){
								echo "<td><span class='badge badge-pill badge-danger'>Humidade alta</span></td>";
							}else
							{
								if($valor_humidade<=70 && $valor_humidade>30){
									echo "<td><span class='badge badge-pill badge-success'>Humidade normal</span></td>";
								}else
								echo "<td><span class='badge badge-pill badge-danger'>Humidade baixa</span></td>";

							}
							?>
							<!-- Fim da informação sobre os pneus -->

						</tr>
						<tr>
							<!--Apresenta a informação da Proximidade: valor e hora da ultima atualização -->
							<td>Proximidade</td>
							<!-- Apresenta o valor da ultima atualização -->
							<td><?php echo $valor_proximidade?> </td>
							<!-- Apresenta a hora da ultima atualização -->
							<td><?php echo $hora_proximidade?></td>
							<!-- Dependendo do 'valor_proximidade', muda o aspeto da mensagem do alerta -->
							<?php if($valor_proximidade=="Objeto Próximo"){
								echo "<td><span class='badge badge-pill badge-danger'> Objeto próximo! </span></td>";
							}else
							{
								
								echo "<td><span class='badge badge-pill badge-success'> Objeto longínquo </span></td>";

							}
							?>
							<!-- Fim da informação sobre a proximidade -->
							
						</tr>
						<tr>
							<!--Apresenta a informação da Proximidade: valor e hora da ultima atualização -->
							<td>White Noise</td>
							<!-- Apresenta o valor da ultima atualização -->
							<td><?php echo $valor_whiteNoise?> %</td>
							<!-- Apresenta a hora da ultima atualização -->
							<td><?php echo $hora_whiteNoise?></td>
							<!-- Dependendo do 'valor_proximidade', muda o aspeto da mensagem do alerta -->
							<?php if($valor_whiteNoise>30){
								echo "<td><span class='badge badge-pill badge-danger'> Níveis elevados </span></td>";
							}else
							{
								
								echo "<td><span class='badge badge-pill badge-success'> Níveis normais </span></td>";

							}
							?>
							<!-- Fim da informação sobre a proximidade -->
							
						</tr>

						<tr>
							<!--Apresenta a informação da Proximidade: valor e hora da ultima atualização -->
							<td>Valores de CO2</td>
							<!-- Apresenta o valor da ultima atualização -->
							<td><?php echo $valor_CO2?> %</td>
							<!-- Apresenta a hora da ultima atualização -->
							<td><?php echo $hora_CO2?></td>
							<!-- Dependendo do 'valor_proximidade', muda o aspeto da mensagem do alerta -->
							<?php if($valor_CO2>45){ 
								echo "<td><span class='badge badge-pill badge-danger'> Níveis elevados </span></td>";
							}else
							{
								if($valor_CO2>20){

									echo "<td><span class='badge badge-pill badge-success'> Níveis altos </span></td>";	
								}else{
								
								echo "<td><span class='badge badge-pill badge-success'> Níveis normais </span></td>";

								}
							}
							?>
							<!-- Fim da informação sobre a proximidade -->
							
						</tr>
						

					</tbody>
				</table>
			</div>		
		</div>
	</div>
	<br>
	<div class="container">
		<canvas id="myChart" style="width:80%;max-width:1100px"></canvas>
		<script>
			//tendo como valores no eixo dos x os sensores, e no eixo dos y os respetivos valores (colocando -10 e 100 no fim para definir os intervalos do eixo dos y)
			var xValues = ["Humidade (em %)", "Bateria (em %)", "White Noise (em %)","Valores de CO2 (em %)","Temperatura (em ºC)"];
			var yValues = [<?php echo $valor_humidade; ?>, <?php echo $valor_bateria; ?>, <?php echo $valor_whiteNoise;?>, <?php echo $valor_CO2;?>,<?php echo $valor_temperatura;?>,-10,100];
			var barColors = ["red", "green","blue","yellow","grey"]; //definir as cores para cada barra de sensores

			new Chart("myChart", {
				type: "bar",
				data: {
					labels: xValues,
					datasets: [{
						backgroundColor: barColors,
						data: yValues
					}]
				},
				options: {
					responsive: true,
					legend: {display: false},
					title: {
						display: true,
						text: "Sensores"
					}

				}
			});
		</script>
	</div>
	<br>
	<br>

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