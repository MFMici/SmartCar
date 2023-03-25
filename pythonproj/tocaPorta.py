import sys
import time
import simpleaudio
import requests

url="http://127.0.0.1/projeto/api/api.php"

def play_sound(nome):
	wave_obj = simpleaudio.WaveObject.from_wave_file("C:/pythonproj/" + nome)

	play_obj = wave_obj.play() # tocar o audio

	play_obj.wait_done() # espera ate o audio terminar 

def datahora():
	dataehora=time.strftime("%Y-%m-%d %H:%M:%S",time.gmtime())
	return dataehora;

def send_to_api(data):
	r=requests.post(url,data)
	
	if r.status_code == 200:
		print("OK: POST realizado com sucesso")
	else:
		print("ERRO: Não foi possível realizar o pedido")

try:
	print("Prima CTRL+C para terminar")
	while True:
		r=requests.get('http://127.0.0.1/projeto/api/api.php?nome=portas')
		if r.status_code == 200:
			print("Status code: ")
			print(str(r.status_code))
			print("O numero de portas abertas é: ")
			#se o número de portas abertas for 2, então emite o som e envia para a API a informação que o som está a ser tocado
			if r.text=="2":
				print(r.text)
				play_sound("Alarm.wav")
				dataehora = datahora()
				print(dataehora)
				valores={'nome':'buzzer' , 'valor':1, 'hora': datahora(), 'pass' : 'ae123'}
				send_to_api(valores)
				print("Tem portas abertas!!")
			else:
				#caso nao haja portas abertas, não emite som, enviando para a API a informação que não está a ser tocado nada
				dataehora = datahora()
				print(dataehora)
				valores={'nome':'buzzer' , 'valor':0, 'hora': datahora(), 'pass' : 'ae123'}
				send_to_api(valores)
				print("Nenhuma porta aberta")
		else:
			print("O pedido HTTP não foi bem sucedido")
		time.sleep(3)

except KeyboardInterrupt:
	print("Programa terminado pelo utilizador")
except:
	print("Ocorreu um erro",sys.exc_info())
finally:
	print("Fim do programa")
