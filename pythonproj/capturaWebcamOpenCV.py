import cv2 as cv
import sys
import time
import requests

url = "http://127.0.0.1/projeto/upload.php"
urlCamera="http://127.0.0.1/projeto/api/api.php?nome=camera"
urlProx = "http://127.0.0.1/projeto/api/api.php?nome=proximidade"   

def datahora():
	dataehora=time.strftime("%Y-%m-%d %H:%M:%S",time.gmtime())
	return dataehora;

camera = cv.VideoCapture(0)

try:
	while True:	
		#faz um pedido GET para obter a informação se existe um objeto próximo ou não
		r = requests.get(urlProx)
		if r.status_code == 200:
			print(str(r.status_code))

			if r.text == "Objeto Próximo":
				#tira a foto da webcam indicada na variavel camera
				ret, image=camera.read()
				print("Resultado da Camera="+str(ret))
				#guarda a imagem com o nome webcam.jpg
				cv.imwrite('webcam.jpg',image)
				#faz um pedido POST, enviando a imagem para o upload.php
				files = {'imagem': ('webcam.jpg', open('webcam.jpg','rb'), 'image/jpeg')}
				r = requests.post(url, files = files)

				#ao tirar a foto, envia para a API a informação que a camera está ligada
				valores={'nome': 'camera' , 'valor': 1, 'hora': datahora(), 'pass' : 'ae123'}
				cam = requests.post(urlCamera,valores)
				if cam.status_code == 200:
					print("OK: POST realizado com sucesso")
				else:
					print("ERRO: Não foi possível realizar o pedido")

				time.sleep(5)
				if r.status_code != 200:
					print("Erro ao fazer o post")
				
			else:
				print("Nenhum objeto próximo")
				#envia para a API a informação que a camera está desligada
				valores={'nome': 'camera' , 'valor': 0, 'hora': datahora(), 'pass' : 'ae123'}
				cam = requests.post(urlCamera,valores)
				if cam.status_code == 200:
					print("OK: POST realizado com sucesso")
				else:
					print("ERRO: Não foi possível realizar o pedido")
				
				time.sleep(5)
		else:
			print("O pedido HTTP não foi bem sucedido")

		

except KeyboardInterrupt:
	print("Except")
finally:
	camera.release()
	cv.destroyAllWindows()
	print("Fim do programa")