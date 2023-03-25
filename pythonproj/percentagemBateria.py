import psutil as ps
import time
import requests

url="http://127.0.0.1/projeto/api/api.php"

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
	while(True):
		batterystats = dict(ps.sensors_battery()._asdict()) #funcao que cria um "dicionário" com os dados da bateria
		timeleft = batterystats.get('secsleft') #indica o tempo restante de bateria
		percentagem = batterystats.get('percent') #indica a percentagem de bateria restante
		ligado = batterystats.get('power_plugged') #indica se a bateria está a ser carregada
		horas = timeleft/3600
		dataehora = datahora()
		print(dataehora)
		#enviamos apenas a percentagem de bateria para a API 
		valores={'nome':'bateria' , 'valor':percentagem, 'hora': datahora(), 'pass' : 'ae123'}
		send_to_api(valores)
		time.sleep(10)

except KeyboardInterrupt:
	print("A sair..")

finally:
	print("Fim do programa")