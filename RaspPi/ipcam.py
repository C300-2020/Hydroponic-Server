import requests

# Change "0" (home network) to "43" (Shujing's hotspot) in the IP address
url = "http://192.168.43.100:81/snapshot.cgi?user=admin&pwd=888888"
req = requests.get(url, stream=True)

fout = open("image.jpg", "wb")

for chunk in req:
	fout.write(chunk)

fout.close()

url = "https://hydroponic.myapplicationdev.com/webservices/back-end/push_data.php"

values = {}
values['id_plant'] = 1

file_url = "image.jpg"

fin = open(file_url, 'rb')

files = {"image": fin}

response = requests.post(url, files = files, data = values)

print(response.text)
