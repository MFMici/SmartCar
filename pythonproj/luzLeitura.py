import sys
import requests
from time import *
from msvcrt import (kbhit, getch)

url="http://127.0.0.1/projeto/api/api.php"

def datahora():
	dataehora=strftime("%Y-%m-%d %H:%M:%S",gmtime())
	return dataehora;

def send_to_api(data):
	r=requests.post(url,data)
	
	if r.status_code == 200:
		print("OK: POST realizado com sucesso")
	else:
		print("ERRO: Não foi possível realizar o pedido")
		

try:
	print("Usage:\n [0] Desligar a luz \n [1] Ligar a luz \n CTRL+C Terminar")
	while True:
		if kbhit():
			tecla=getch() #recebe o valor da tecla que foi carregada
			if tecla == b'0': #se a tecla pressionada for o 0, então envia para a API a informação que é para desligar a luz de leitura
				dataehora = datahora()
				print(dataehora)
				valores={'nome': 'luzLeitura' , 'valor': 0, 'hora': datahora(), 'pass' : 'ae123'}
				send_to_api(valores)
				print("\nLuz foi desligada")
			elif tecla == b'1': #se a tecla pressionada for o 1, então envia para a API a informação que é para ligar a luz de leitura
				dataehora = datahora()
				print(dataehora)
				valores={'nome': 'luzLeitura' , 'valor': 1, 'hora': datahora(), 'pass' : 'ae123'}
				send_to_api(valores)
				print("\nLuz foi ligada ")
			else:
				print("\nOpção Inválida")
except KeyboardInterrupt:
	print("Programa terminado pelo utilizador")
except:
	print("Ocorreu um erro",sys.exc_info())
finally:
	print("Fim do programa")