import requests
from new_mitemp import *

url = "https://hydroponic.myapplicationdev.com/webservices/back-end/push_data.php"

temp_data = retrieve_temp()
humidity_data = retrieve_humidity()

print(temp_data)
print(humidity_data)

values = {}
values['id_plant'] = 1
values['humidity'] = humidity_data

response = requests.post(url, data = values)

print(response.text)

values = {}
values['id_plant'] = 1
values['temp'] = temp_data

response = requests.post(url, data = values)

print(response.text)
