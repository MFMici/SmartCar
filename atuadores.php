<?php 

//criação das variáveis para ir buscar os dados aos ficheiros

//para a ventoinha
$estado_ventoinha= file_get_contents("api/files/ventoinha/valor.txt");
$hora_ventoinha = file_get_contents("api/files/ventoinha/hora.txt");
$nome_ventoinha = file_get_contents("api/files/ventoinha/nome.txt");
//fim das variaveis para a ventoinha

//para a porta
$estado_portas = file_get_contents("api/files/portas/valor.txt");
$hora_portas = file_get_contents("api/files/portas/hora.txt");
$nome_portas = file_get_contents("api/files/portas/nome.txt");
//fim das variaveis para a porta

//para farois
$estado_farois = file_get_contents("api/files/farois/valor.txt");
$hora_farois = file_get_contents("api/files/farois/hora.txt");
$nome_farois = file_get_contents("api/files/farois/nome.txt");
//fim das variaveis para farois

//para a camera
$estado_camera = file_get_contents("api/files/camera/valor.txt");
$hora_camera = file_get_contents("api/files/camera/hora.txt");
$nome_camera = file_get_contents("api/files/camera/nome.txt");
//fim das variaveis para a camera

//para o buzzer
$estado_buzzer = file_get_contents("api/files/buzzer/valor.txt");
$hora_buzzer = file_get_contents("api/files/buzzer/hora.txt");
$nome_buzzer = file_get_contents("api/files/buzzer/nome.txt");
//fim das variaveis para o buzzer

$valor_luzLeitura = file_get_contents("api/files/luzLeitura/valor.txt");
$hora_luzLeitura = file_get_contents("api/files/luzLeitura/hora.txt");
$nome_luzLeitura = file_get_contents("api/files/luzLeitura/nome.txt");

$valor_luzCO2 = file_get_contents("api/files/luzCO2/valor.txt");
$hora_luzCO2 = file_get_contents("api/files/luzCO2/hora.txt");
$nome_luzCO2 = file_get_contents("api/files/luzCO2/nome.txt");

$valor_luzBateria = file_get_contents("api/files/luzBateria/valor.txt");
$hora_luzBateria = file_get_contents("api/files/luzBateria/hora.txt");
$nome_luzBateria = file_get_contents("api/files/luzBateria/nome.txt");

$valor_luzPortas = file_get_contents("api/files/luzPortas/valor.txt");
$hora_luzPortas = file_get_contents("api/files/luzPortas/hora.txt");
$nome_luzPortas = file_get_contents("api/files/luzPortas/nome.txt");

$valor_tejadilho = file_get_contents("api/files/tejadilho/valor.txt");
$hora_tejadilho = file_get_contents("api/files/tejadilho/hora.txt");
$nome_tejadilho = file_get_contents("api/files/tejadilho/nome.txt");

$valor_trancado = file_get_contents("api/files/estado/valor.txt");
$hora_trancado = file_get_contents("api/files/estado/hora.txt");
$nome_trancado = file_get_contents("api/files/estado/nome.txt");


$url = "http://127.0.0.1/projeto/api/api.php";
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
	<meta charset="UTF-8">

	<!-- Página faz refresh de 10 em 10 segundos-->
	<!-- <meta http-equiv="refresh" content="2"> -->

	<!-- Referência ao ficheiro css utlizado -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Css2.css">

	<!-- Título da página -->
	<title>allEletric Atuadores</title>

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
			<div class="class-header p-3 mb-2 bg-danger text-dark"> <b>Tabela de Atuadores</b></div>
			
			<div class="card-body" >
				<table class="table">
					<!-- Cria o table header -->
					<thead>
						<tr>
							<th scope="col">Tipo de Atuador IoT</th>
							<th scope="col">Estado</th>
							<th scope="col">Data de Atualização</th>	
						</tr>
					</thead>
					<!-- Fim  do table header -->
					<tbody>
						<tr>
							<!--Apresenta a informação do Ar Condicionado -->
							<td>Ventoinha</td>
							<!-- Caso esteja ligado ou desligado apresenta uma mensagem -->
							<?php if($estado_ventoinha>=1){
								echo "<td><span class='badge badge-pill badge-success'>Ligado</span></td>";
								
							}else
							{
								echo "<td><span class='badge badge-pill badge-danger'>Desligado</span></td>";

							}
							?>
							<!-- Apresenta a hora da ultima atualização -->
							<td><?php echo $hora_ventoinha?></td>
							
							
						</tr>

						<tr>
							<!--Apresenta a informação das Portas -->
							<td>Portas</td>
							<!-- Apresenta a quantidade de portas abertas/fechadas -->
							<?php 
							//faz envio POST para a API com a informação do botão em que se carregou (se abriu ou fechou as portes)
							if($estado_portas==0){
								
								
								if($utilizador != "carro"){ //pois o utilizador "carro" não tem controlo sobre nada, é apenas um modo de visualização
									if($valor_trancado==1){ //se o carro estiver trancado, apenas mostra essa informação, não permitindo abrir as portas
										echo "
										<td><span class='badge badge-pill badge-primary'> Portas trancadas </span></td>
										<td>".$hora_trancado."</td>";
									}else{
										echo "
										<td><span class='badge badge-pill badge-primary'> Fechou 2 portas </span></td>
										<td>".$hora_portas."</td>

										<form method='post' action='http://127.0.0.1/projeto/api/api.php' target='ifrm1'> 
										<input name='nome' type='hidden' value='portas'></input>
										<input name='valor' type='hidden' value='2'></input>
										<input name='hora' type='hidden' value='".date("Y-m-d H:i:s")."'></input>
										<input name='pass' type='hidden' value='ae123'></input>
										<input type='submit' value='Abrir Portas'></input>
										</form>
										<iframe id='ifrm1' name='ifrm1' style='display:none'></iframe>";
									}
								}
						}else{ //se o carro estiver trancado, permite na mesma fechar as portas
							echo "<td><span class='badge badge-pill badge-primary'> Abriu 2 portas </span></td>";
							echo "<td>".$hora_portas."</td>";
							if($utilizador != "carro"){
								echo "<form method='post' action='http://127.0.0.1/projeto/api/api.php' target='ifrm1'> 
								<input name='nome' type='hidden' value='portas'></input>
								<input name='valor' type='hidden' value='0'></input>
								<input name='hora' type='hidden' value='".date("Y-m-d H:i:s")."'></input>
								<input name='pass' type='hidden' value='ae123'></input>
								<input type='submit' value='Fechar Portas'></input>


								</form>
								<iframe id='ifrm1' name='ifrm1' style='display:none'></iframe>";
							}
						}
						?>


					</tr>
					<tr>
						<!--Apresenta a informação da Lampada -->
						<td>Faróis</td>
						<!-- Caso esteja ligado ou desligado apresenta uma mensagem -->
						<?php if($estado_farois>=1){
							echo "<td><span class='badge badge-pill badge-success'>Ligados</span></td>";

						}else
						{
							echo "<td><span class='badge badge-pill badge-danger'>Desligados</span></td>";

						}
						?>
						<!-- Apresenta a hora da ultima atualização -->
						<td><?php echo $hora_farois?></td>

					</tr>
					<tr>
						<!--Apresenta a informação da Camera - neste caso a camera é um atuador pois apenas se liga/desliga consoante a distância a objetos -->
						<td>Camera</td>
						<!-- Caso esteja ligado ou desligado apresenta uma mensagem -->
						<?php if($estado_camera>=1){
							echo "<td><span class='badge badge-pill badge-success'>Ligada</span></td>";

						}else
						{
							echo "<td><span class='badge badge-pill badge-danger'>Desligada</span></td>";

						}
						?>
						<!-- Apresenta a hora da ultima atualização -->
						<td><?php echo $hora_camera?></td>

					</tr>

					<tr>
						<!--Apresenta a informação do Buzzer -->
						<td>Buzzer</td>
						<!-- Caso esteja ligado ou desligado apresenta uma mensagem -->
						<?php if($estado_buzzer==1){
							echo "<td><span class='badge badge-pill badge-success'>Ligado</span></td>";

						}else
						{
							echo "<td><span class='badge badge-pill badge-danger'>Desligado</span></td>";

						}
						?>
						<!-- Apresenta a hora da ultima atualização -->
						<td><?php echo $hora_buzzer?></td>

					</tr>

					<tr>
						<td>Luz de Leitura</td>
						<?php 
						//envia pedido post para a API com a informação do botão em que se carregou
						if($valor_luzLeitura==0){
								if($utilizador != "carro"){ //pois o utilizador "carro" não tem controlo sobre nada, é apenas um modo de visualização
								echo "<form method='post' action='http://127.0.0.1/projeto/api/api.php' target='ifrm1'> 
								<input name='nome' type='hidden' value='luzLeitura'></input>
								<input name='valor' type='hidden' value='1'></input>
								<input name='hora' type='hidden' value='".date("Y-m-d H:i:s")."'></input>
								<input name='pass' type='hidden' value='ae123'></input>
								<input type='submit' value='Ligar Luz de Leitura'></input>
								</form>
								<iframe id='ifrm1' name='ifrm1' style='display:none'></iframe>";
							}
						}else{
							if($utilizador != "carro"){
								echo "<form method='post' action='http://127.0.0.1/projeto/api/api.php' target='ifrm1'> 
								<input name='nome' type='hidden' value='luzLeitura'></input>
								<input name='valor' type='hidden' value='0'></input>
								<input name='hora' type='hidden' value='".date("Y-m-d H:i:s")."'></input>
								<input name='pass' type='hidden' value='ae123'></input>
								<input type='submit' value='Desligar Luz de Leitura'></input>


								</form>
								<iframe id='ifrm1' name='ifrm1' style='display:none'></iframe>";
							}
						}
						?>
						<!-- Apresenta o valor da ultima atualização -->
						<?php if($valor_luzLeitura==0){
							echo "<td><span class='badge badge-pill badge-danger'> Luz apagada! </span></td>";
						}else
						{
							echo "<td><span class='badge badge-pill badge-success'> Luz acesa </span></td>";
						}
						?>
						<!-- Apresenta a hora da ultima atualização -->
						<td><?php echo $hora_luzLeitura?></td>


					</tr>

					<tr>
						<!--Apresenta a informação da Proximidade: valor e hora da ultima atualização -->
						<td>Luz de Aviso CO2</td>
						<!-- Apresenta o valor da ultima atualização -->
						<?php if($valor_luzCO2==0){
							echo "<td><span class='badge badge-pill badge-success'> Luz apagada </span></td>";
						}else
						{
							if($valor_luzCO2==1){
								echo "<td><span class='badge badge-pill badge-danger'> Luz acesa (Aviso Nível Médio) </span></td>";
							}else{
								echo "<td><span class='badge badge-pill badge-danger'> Luz acesa (Aviso Nível Alto) </span></td>";
							}
						}
						?>
						<!-- Apresenta a hora da ultima atualização -->
						<td><?php echo $hora_luzCO2?></td>


					</tr>

					<tr>
						<!--Apresenta a informação da Proximidade: valor e hora da ultima atualização -->
						<td>Luz de Aviso Bateria</td>
						<!-- Apresenta o valor da ultima atualização -->
						<?php if($valor_luzBateria==0){
							echo "<td><span class='badge badge-pill badge-success'> Luz apagada </span></td>";
						}else
						{
							echo "<td><span class='badge badge-pill badge-danger'> Luz acesa </span></td>";

						}
						?>
						<!-- Apresenta a hora da ultima atualização -->
						<td><?php echo $hora_luzBateria?></td>


					</tr>

					<tr>
						<!--Apresenta a informação da Proximidade: valor e hora da ultima atualização -->
						<td>Luz de Aviso Portas</td>
						<!-- Apresenta o valor da ultima atualização -->
						<?php if($valor_luzPortas==0){
							echo "<td><span class='badge badge-pill badge-success'> Portas fechadas </span></td>";
						}else
						{
							echo "<td><span class='badge badge-pill badge-danger'> Portas abertas </span></td>";

						}
						?>
						<!-- Apresenta a hora da ultima atualização -->
						<td><?php echo $hora_luzPortas?></td>


					</tr>

					<tr>
						<!--Apresenta a informação da Proximidade: valor e hora da ultima atualização -->
						<td>Tejadilho</td>
						<!-- Apresenta o valor da ultima atualização -->
						<?php if($valor_tejadilho==0){
							echo "<td><span class='badge badge-pill badge-danger'> Fechado </span></td>";
						}else
						{

							echo "<td><span class='badge badge-pill badge-success'> Aberto </span></td>";

						}
						?>
						<!-- Apresenta a hora da ultima atualização -->
						<td><?php echo $hora_tejadilho?></td>


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