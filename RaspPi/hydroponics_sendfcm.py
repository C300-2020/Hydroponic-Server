#!/usr/bin/env python3

import requests
import json

def send_message(msg):

	serverToken = ''

	headers = {
    	'Content-Type': 'application/json',
    	'Authorization': 'key=' + serverToken,
	}

	body = {
		'notification': {'title': 'Hydroponics App', 'body': msg},
 		'to': '/topics/hydrophonic-app',
		'priority': 'high',
           
	}

	response = requests.post("https://fcm.googleapis.com/fcm/send", headers = headers, data=json.dumps(body))
	print(response.status_code)

	print(response.json())