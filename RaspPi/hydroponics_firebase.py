import RPi.GPIO as GPIO
import pyrebase
from firebasedata import LiveData
import hydroponics_sendfcm

# Set mode BCM
GPIO.setmode(GPIO.BCM)

# PIN connected to IN1
light_relay_pin = 23

# PIN connected to IN2
water_relay_pin = 20

# Type of PIN - output
GPIO.setup(light_relay_pin, GPIO.OUT)
GPIO.setup(water_relay_pin, GPIO.OUT)


def light_on():
	GPIO.output(light_relay_pin, False)
	hydroponics_sendfcm.send_message("Light is turned on")

def light_off():
	GPIO.output(light_relay_pin, True)
	hydroponics_sendfcm.send_message("Light is turned off")

def waterpump_on():
	GPIO.output(water_relay_pin, False)
	hydroponics_sendfcm.send_message("Water pump is turned on")

def waterpump_off():
	GPIO.output(water_relay_pin, True)
	hydroponics_sendfcm.send_message("Water pump is turned off")



config = {     
  "apiKey": "",
  "authDomain": ".firebaseapp.com",
  "databaseURL": "https://.firebaseio.com/",
  "storageBucket": ".appspot.com"
}

app = pyrebase.initialize_app(config)  

print("Here we go! Press CTRL+C to exit")


light = ''
water = ''

def my_handler(sender, value=None, path="/controls/1"):
	global light
	global water
	
	print(value)

	if "light" in value.keys() and value['light'] != light:
		print ("Light has been switched to " + ("on" if value['light'] == "on" else "off"))
		light = value['light']

		if value['light'] == "on":
			light_on()
		elif value['light'] == "off":
			light_off()
	if "water" in value.keys() and value['water'] != water:
		print ("Water has been switched to " + str(value['water'] ))
		water = value['water']

		if value['water'] == "off":
			waterpump_off()
		else:
			waterpump_on()

try:
	live = LiveData(app, 'controls')

	data = live.get_data()
	all_data = data.get()
	light_data = data.get('1/light')
	water_data = data.get('1/water')

	print ("ALL DATA " + "\n" + "-" * 10)
	print (all_data)

	water = all_data[1]["water"] 
	light = all_data[1]["light"]  

	msg = "on" if water == "on" else "off"
	print ("Water is currently " + msg )
	msg = "on" if light == "on" else "off"
	print ("Light is currently " + msg )

	live.signal('/1').connect(my_handler)

except KeyboardInterrupt:
	print ("Program exited")
