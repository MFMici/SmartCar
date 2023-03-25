<?php 
$opcao=$_REQUEST['opcao'];
$utilizador=$_SESSION['username'];
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<div class="container">
		<!-- Logótipo da marca na navbar -->
		<img src="simbolo.png" class="img-fluid" alt="allEletric logo" height="40">
		
		<!-- Nome da marca na navbar -->
		<a class="navbar-brand" style="color: red" href="dashboard.php?opcao=dashboard">&nbsp;allEletric&nbsp;</a>

		<!-- Início das opções na navbar, com condições para saber em qual página se carregou -->
		<?php 

		//quando está na página dashboard.php, coloca a "Página Principal" como activa para distinguir das outras páginas, fazendo uma animação quando se faz hover nestas -> tabindex=-1 no dropdown para poder navegar dentro do dropdown(e não consegue ser acedido pelo teclado)
		if($opcao=="dashboard"){
			echo "
			<ul class='navbar-nav mr-auto'>
			<li class='nav-item'>
			<a class='nav-link active' href='dashboard.php?opcao=dashboard'>Página Principal<span class='sr-only'>(current)</span></a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='sensores.php?opcao=sensores'>Sensores</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='atuadores.php?opcao=atuadores'>Atuadores</a>
			</li>";//se o utilizador 
			if ($utilizador=="Micael"){
				echo "<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='painel.php?opcao=painel'>Painel de controlo</a>
				</li>
				<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='imagens.php?opcao=imagens'>Histórico Imagens</a>
				</li>";
			}

			if($utilizador != "carro"){ //no modo visualização, apenas permite-se ver os valores atuais, e não os dados do historico
				echo "
				<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='perfil.php?opcao=".$utilizador."'>Perfil</a>
				</li>

				</ul>

				<div class='nav-item dropdown'>
				<div class='dropdown'>
				<a class='nav-link dropdown-toggle hvr-underline-from-center' href=' # ' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:#b3b5b4;'>
				Histórico
				</a>

				<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				<ul>
				<li class='dropdown-submenu'>
				<a class='test dropdown-item' tabindex='-1' href=' # '>Sensores <span class='caret'></span></a>
				<ul class='dropdown-menu'>
				<li>
				<a class='dropdown-item' href='historico.php?opcao=historico&sensor=bateria&tipo=Sensores'>Bateria</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luminosidade&tipo=Sensores'>Luminosidade</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=temperatura&tipo=Sensores'>Temperatura</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=whiteNoise&tipo=Sensores'>White Noise</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=humidade&tipo=Sensores'>Humidade</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=proximidade&tipo=Sensores'>Estado das proximidades</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=CO2&tipo=Sensores'>Níveis de CO2</a></li>

				</ul>
				<a class='test dropdown-item' tabindex='-1' href=' # '>Atuadores <span class='caret'></span></a>
				<ul class='dropdown-menu'>
				<li>
				<a class='dropdown-item' href='historico.php?opcao=historico&sensor=arCondicionado&tipo=Atuadores'>Ar Condicionado</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=farois&tipo=Atuadores'>Faróis</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=buzzer&tipo=Atuadores'>Buzzer</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=camera&tipo=Atuadores'>Camera</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=portas&tipo=Atuadores'>Portas</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzLeitura&tipo=Atuadores'>Luz de leitura</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzCO2&tipo=Atuadores'>Luz aviso CO2</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzBateria&tipo=Atuadores'>Luz aviso Bateria</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzPortas&tipo=Atuadores'>Luz aviso Portas</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=tejadilho&tipo=Atuadores'>Tejadilho</a></li>";
							//se o utilizador for o admin
				if ($utilizador=="Micael"){
					echo "<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=estado&tipo=atuador'>On/Off</a></li>";
				}
				echo "
				</ul>

				</li>
				</ul>
				</div>




				</div>
				</div>

				";
			}

		}else
		//quando está na página atuadores.php, coloca "Atuadores" como activa para distinguir das outras páginas, fazendo uma animação quando se faz hover nestas
		if($opcao=="atuadores")
		{
			echo "
			<ul class='navbar-nav mr-auto'>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='dashboard.php?opcao=dashboard'>Página Principal<span class='sr-only'>(current)</span></a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='sensores.php?opcao=sensores'>Sensores</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link active' href='atuadores.php?opcao=atuadores'>Atuadores</a>
			</li>";

			if ($utilizador=="Micael"){
				echo "<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='painel.php?opcao=painel'>Painel de controlo</a>
				</li>
				<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='imagens.php?opcao=imagens'>Histórico Imagens</a>
				</li>";
			}

			if($utilizador != "carro"){
				echo "
				<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='perfil.php?opcao=".$utilizador."'>Perfil</a>
				</li>

				</ul>

				<div class='nav-item dropdown'>
				<div class='dropdown'>
				<a class='nav-link dropdown-toggle hvr-underline-from-center' href=' # ' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:#b3b5b4;'>
				Histórico
				</a>

				<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				<ul>
				<li class='dropdown-submenu'>
				<a class='test dropdown-item' tabindex='-1' href=' # '>Sensores <span class='caret'></span></a>
				<ul class='dropdown-menu'>

				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=bateria&tipo=Sensores'>Bateria</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luminosidade&tipo=Sensores'>Luminosidade</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=temperatura&tipo=Sensores'>Temperatura</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=whiteNoise&tipo=Sensores'>White Noise</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=humidade&tipo=Sensores'>Humidade</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=proximidade&tipo=Sensores'>Estado das proximidades</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=CO2&tipo=Sensores'>Níveis de CO2</a></li>
				

				</ul>
				<a class='test dropdown-item' tabindex='-1' href=' # '>Atuadores <span class='caret'></span></a>
				<ul class='dropdown-menu'>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=arCondicionado&tipo=Atuadores'>Ar Condicionado</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=farois&tipo=Atuadores'>Faróis</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=buzzer&tipo=Atuadores'>Buzzer</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=camera&tipo=Atuadores'>Camera</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=portas&tipo=Atuadores'>Portas</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzLeitura&tipo=Atuadores'>Luz de leitura</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzCO2&tipo=Atuadores'>Luz aviso CO2</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzBateria&tipo=Atuadores'>Luz aviso Bateria</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzPortas&tipo=Atuadores'>Luz aviso Portas</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=tejadilho&tipo=Atuadores'>Tejadilho</a></li>";
							//se o utilizador for o admin
				if ($utilizador=="Micael"){
					echo "<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=estado&tipo=atuador'>On/Off</a></li>";
				}
				echo "
				</ul>
				</li>
				</ul>
				</div>




				</div>
				</div>

				";
			}

		}else
		
		if($opcao=="sensores")
		{
			echo "
			<ul class='navbar-nav mr-auto'>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='dashboard.php?opcao=dashboard'>Página Principal<span class='sr-only'>(current)</span></a>
			</li>
			<li class='nav-item'>
			<a class='nav-link active' href='sensores.php?opcao=sensores'>Sensores</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='atuadores.php?opcao=atuadores'>Atuadores</a>
			</li> ";
			if ($utilizador=="Micael"){
				echo "<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='painel.php?opcao=painel'>Painel de controlo</a>
				</li>
				<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='imagens.php?opcao=imagens'>Histórico Imagens</a>
				</li>";
			}
			if($utilizador != "carro"){
				echo "
				<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='perfil.php?opcao=".$utilizador."'>Perfil</a>
				</li>
				</ul>

				<div class='nav-item dropdown'>
				<div class='dropdown'>
				<a class='nav-link dropdown-toggle hvr-underline-from-center' href=' # ' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:#b3b5b4;'>
				Histórico
				</a>

				<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				<ul>
				<li class='dropdown-submenu'>
				<a class='test dropdown-item' tabindex='-1' href=' # '>Sensores <span class='caret'></span></a>
				<ul class='dropdown-menu'>

				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=bateria&tipo=Sensores'>Bateria</a>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luminosidade&tipo=Sensores'>Luminosidade</a>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=temperatura&tipo=Sensores'>Temperatura</a>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=whiteNoise&tipo=Sensores'>White Noise</a>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=humidade&tipo=Sensores'>Humidade</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=proximidade&tipo=Sensores'>Estado das proximidades</a>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=CO2&tipo=Sensores'>Níveis de CO2</a></li>
				

				</ul>
				<a class='test dropdown-item' tabindex='-1' href=' # '>Atuadores <span class='caret'></span></a>
				<ul class='dropdown-menu'>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=arCondicionado&tipo=Atuadores'>Ar Condicionado</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=farois&tipo=Atuadores'>Faróis</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=buzzer&tipo=Atuadores'>Buzzer</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=camera&tipo=Atuadores'>Camera</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=portas&tipo=Atuadores'>Portas</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzLeitura&tipo=Atuadores'>Luz de leitura</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzCO2&tipo=Atuadores'>Luz aviso CO2</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzBateria&tipo=Atuadores'>Luz aviso Bateria</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzPortas&tipo=Atuadores'>Luz aviso Portas</a></li>
				<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=tejadilho&tipo=Atuadores'>Tejadilho</a></li>";
							//se o utilizador for o admin
				if ($utilizador=="Micael"){
					echo "<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=estado&tipo=atuador'>On/Off</a></li>";
				}
				echo "
				</ul>
				</li>
				</ul>
				</div>




				</div>
				</div>";
			}

		}
		else // Quando a opção da navbar selecionada foi "Histórico" coloca-a como activa para distinguir das outras páginas, fazendo uma animação quando se faz hover nestas
		if($opcao=="historico"){
			echo "
			<ul class='navbar-nav mr-auto'>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='dashboard.php?opcao=dashboard'>Página Principal<span class='sr-only'>(current)</span></a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='sensores.php?opcao=sensores'>Sensores</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='atuadores.php?opcao=atuadores'>Atuadores</a>
			</li> ";
			if ($utilizador=="Micael"){
				echo "<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='painel.php?opcao=painel'>Painel de controlo</a>
				</li>
				<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='imagens.php?opcao=imagens'>Histórico Imagens</a>
				</li>";
			}
			echo "
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='perfil.php?opcao=".$utilizador."'>Perfil</a>
			</li>
			</ul>

			<div class='nav-item dropdown'>
			<div class='dropdown'>
			<a class='nav-link dropdown-toggle active' href=' # ' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:white !important;'>
			Histórico
			</a>

			<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
			<ul>
			<li class='dropdown-submenu'>
			<a class='test dropdown-item' tabindex='-1' href=' # '>Sensores <span class='caret'></span></a>
			<ul class='dropdown-menu'>

			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=bateria&tipo=Sensores'>Bateria</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luminosidade&tipo=Sensores'>Luminosidade</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=temperatura&tipo=Sensores'>Temperatura</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=whiteNoise&tipo=Sensores'>White Noise</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=humidade&tipo=Sensores'>Humidade</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=proximidade&tipo=Sensores'>Estado das proximidades</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=CO2&tipo=Sensores'>Níveis de CO2</a></li>
			

			</ul>
			<a class='test dropdown-item' tabindex='-1' href=' # '>Atuadores <span class='caret'></span></a>
			<ul class='dropdown-menu'>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=arCondicionado&tipo=Atuadores'>Ar Condicionado</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=farois&tipo=Atuadores'>Faróis</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=buzzer&tipo=Atuadores'>Buzzer</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=camera&tipo=Atuadores'>Camera</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=portas&tipo=Atuadores'>Portas</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzLeitura&tipo=Atuadores'>Luz de leitura</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzCO2&tipo=Atuadores'>Luz aviso CO2</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzBateria&tipo=Atuadores'>Luz aviso Bateria</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzPortas&tipo=Atuadores'>Luz aviso Portas</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=tejadilho&tipo=Atuadores'>Tejadilho</a></li>";
							//se o utilizador for o admin
			if ($utilizador=="Micael"){
				echo "<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=estado&tipo=atuador'>On/Off</a></li>";
			}
			echo "
			</ul>
			</li>
			</ul>
			</div>




			</div>
			</div>
			";

		}else
		// entra nesta parte do código se o ultilizador for "Micael", que é o utilizador com mais permissões 
		if($opcao == "painel")
		{

			echo "
			<ul class='navbar-nav mr-auto'>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='dashboard.php?opcao=dashboard'>Página Principal<span class='sr-only'>(current)</span></a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='sensores.php?opcao=sensores'>Sensores</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='atuadores.php?opcao=atuadores'>Atuadores</a>
			</li> 
			<li class='nav-item'>
			<a class='nav-link active' href='painel.php?opcao=painel'>Painel de controlo</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='imagens.php?opcao=imagens'>Histórico Imagens</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='perfil.php?opcao=".$utilizador."'>Perfil</a>
			</li>
			</ul>

			<div class='nav-item dropdown'>
			<div class='dropdown'>
			<a class='nav-link dropdown-toggle hvr-underline-from-center' href=' # ' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:#b3b5b4;'>
			Histórico
			</a>

			<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
			<ul>
			<li class='dropdown-submenu'>
			<a class='test dropdown-item' tabindex='-1' href=' # '>Sensores <span class='caret'></span></a>
			<ul class='dropdown-menu'>

			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=bateria&tipo=Sensores'>Bateria</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luminosidade&tipo=Sensores'>Luminosidade</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=temperatura&tipo=Sensores'>Temperatura</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=whiteNoise&tipo=Sensores'>White Noise</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=humidade&tipo=Sensores'>Humidade</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=proximidade&tipo=Sensores'>Estado das proximidades</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=CO2&tipo=Sensores'>Níveis de CO2</a></li>
			

			</ul>
			<a class='test dropdown-item' tabindex='-1' href=' # '>Atuadores <span class='caret'></span></a>
			<ul class='dropdown-menu'>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=arCondicionado&tipo=Atuadores'>Ar Condicionado</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=farois&tipo=Atuadores'>Faróis</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=buzzer&tipo=Atuadores'>Buzzer</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=camera&tipo=Atuadores'>Camera</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=portas&tipo=Atuadores'>Portas</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzLeitura&tipo=Atuadores'>Luz de leitura</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzCO2&tipo=Atuadores'>Luz aviso CO2</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzBateria&tipo=Atuadores'>Luz aviso Bateria</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzPortas&tipo=Atuadores'>Luz aviso Portas</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=tejadilho&tipo=Atuadores'>Tejadilho</a></li>";

			if ($utilizador=="Micael"){
				echo "<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=estado&tipo=atuador'>On/Off</a></li>";
			}
			echo "
			</ul>
			</li>
			</ul>
			</div>




			</div>
			</div>";


		}else

		if($opcao == "imagens"){ //entra aqui se quisermos mostrar o Historico de Imagens (apenas permitido para os utilizadores Micael e Andre)

			echo "
			<ul class='navbar-nav mr-auto'>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='dashboard.php?opcao=dashboard'>Página Principal<span class='sr-only'>(current)</span></a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='sensores.php?opcao=sensores'>Sensores</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='atuadores.php?opcao=atuadores'>Atuadores</a>
			</li> ";
			if ($utilizador=="Micael"){
				echo "<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='painel.php?opcao=painel'>Painel de controlo</a>
				</li>
				<li class='nav-item'>
				<a class='nav-link active' href='imagens.php?opcao=imagens'>Histórico Imagens</a>
				</li>";
			}
			echo "
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='perfil.php?opcao=".$utilizador."'>Perfil</a>
			</li>
			</ul>

			<div class='nav-item dropdown'>
			<div class='dropdown'>
			<a class='nav-link dropdown-toggle hvr-underline-from-center' href=' # ' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:#b3b5b4;'>
			Histórico
			</a>

			<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
			<ul>
			<li class='dropdown-submenu'>
			<a class='test dropdown-item' tabindex='-1' href=' # '>Sensores <span class='caret'></span></a>
			<ul class='dropdown-menu'>

			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=bateria&tipo=Sensores'>Bateria</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luminosidade&tipo=Sensores'>Luminosidade</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=temperatura&tipo=Sensores'>Temperatura</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=whiteNoise&tipo=Sensores'>White Noise</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=humidade&tipo=Sensores'>Humidade</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=proximidade&tipo=Sensores'>Estado das proximidades</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=CO2&tipo=Sensores'>Níveis de CO2</a></li>

			</ul>
			<a class='test dropdown-item' tabindex='-1' href=' # '>Atuadores <span class='caret'></span></a>
			<ul class='dropdown-menu'>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=arCondicionado&tipo=Atuadores'>Ar Condicionado</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=farois&tipo=Atuadores'>Faróis</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=buzzer&tipo=Atuadores'>Buzzer</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=camera&tipo=Atuadores'>Camera</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=portas&tipo=Atuadores'>Portas</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzLeitura&tipo=Atuadores'>Luz de leitura</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzCO2&tipo=Atuadores'>Luz aviso CO2</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzBateria&tipo=Atuadores'>Luz aviso Bateria</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzPortas&tipo=Atuadores'>Luz aviso Portas</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=tejadilho&tipo=Atuadores'>Tejadilho</a></li>";
							//se o utilizador for o admin
			if ($utilizador=="Micael"){
				echo "<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=estado&tipo=atuador'>On/Off</a></li>";
			}
			echo "
			</ul>
			</li>
			</ul>
			</div>




			</div>
			</div>";
			
		}else{ //entra aqui se for para mostrar o perfil, apenas visivel para os utlizadores Micael e Andre
			echo "
			<ul class='navbar-nav mr-auto'>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='dashboard.php?opcao=dashboard'>Página Principal<span class='sr-only'>(current)</span></a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='sensores.php?opcao=sensores'>Sensores</a>
			</li>
			<li class='nav-item'>
			<a class='nav-link hvr-underline-from-center' href='atuadores.php?opcao=atuadores'>Atuadores</a>
			</li> ";
			if ($utilizador=="Micael"){
				echo "<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='painel.php?opcao=painel'>Painel de controlo</a>
				</li>
				<li class='nav-item'>
				<a class='nav-link hvr-underline-from-center' href='imagens.php?opcao=imagens'>Histórico Imagens</a>
				</li>";
			}
			echo "
			<li class='nav-item'>
			<a class='nav-link active' href='perfil.php?opcao=".$utilizador."'>Perfil</a>
			</li>
			</ul>

			<div class='nav-item dropdown'>
			<div class='dropdown'>
			<a class='nav-link dropdown-toggle hvr-underline-from-center' href=' # ' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:#b3b5b4;'>
			Histórico
			</a>

			<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
			<ul>
			<li class='dropdown-submenu'>
			<a class='test dropdown-item' tabindex='-1' href=' # '>Sensores <span class='caret'></span></a>
			<ul class='dropdown-menu'>

			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=bateria&tipo=Sensores'>Bateria</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luminosidade&tipo=Sensores'>Luminosidade</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=temperatura&tipo=Sensores'>Temperatura</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=whiteNoise&tipo=Sensores'>White Noise</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=humidade&tipo=Sensores'>Humidade</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=proximidade&tipo=Sensores'>Estado das proximidades</a>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=CO2&tipo=Sensores'>Níveis de CO2</a></li>

			</ul>
			<a class='test dropdown-item' tabindex='-1' href=' # '>Atuadores <span class='caret'></span></a>
			<ul class='dropdown-menu'>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=arCondicionado&tipo=Atuadores'>Ar Condicionado</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=farois&tipo=Atuadores'>Faróis</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=buzzer&tipo=Atuadores'>Buzzer</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=camera&tipo=Atuadores'>Camera</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=portas&tipo=Atuadores'>Portas</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzLeitura&tipo=Atuadores'>Luz de leitura</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzCO2&tipo=Atuadores'>Luz aviso CO2</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzBateria&tipo=Atuadores'>Luz aviso Bateria</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=luzPortas&tipo=Atuadores'>Luz aviso Portas</a></li>
			<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=tejadilho&tipo=Atuadores'>Tejadilho</a></li>";
							//se o utilizador for o admin
			if ($utilizador=="Micael"){
				echo "<li><a class='dropdown-item' href='historico.php?opcao=historico&sensor=estado&tipo=atuador'>On/Off</a></li>";
			}
			echo "
			</ul>
			</li>
			</ul>
			</div>
			</div>
			</div>";
		}
		?>
		
	</div>

	<!-- botão do logout com a imagem -->
	<a href="logout.php" class="btn btn-danger hvr-buzz-out" role="button"><img src="logout.png" class="hvr-icon" alt="logo do logout"/> Sair</a>


</nav>

<!-- Retorna ao ficheiro que fez include da navbar.php -->
