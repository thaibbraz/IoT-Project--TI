import requests
import picamera
from time import sleep
camera = picamera.PiCamera()
camera.hflip = True
camera.vflip = True
file_name = "capture.jpg"
print("a capturar imagem...")
camera.capture(file_name)
camera.close()
sleep(1)
print("ok")
print("a enviar para o serviço Web...")
url = "http://iot.dei.estg.ipleiria.pt/receberSensores.php"
_file = {'file': open("capture.jpg", 'rb')}
_data = {'autenticacao': '!!ti!!'}
r = requests.post(url, data=_data, files=_)