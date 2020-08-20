#!/usr/bin/env python3
# add these 3 lines to 
#pip3 install bluepy
#pip3 install btlewrap
#pip3 install mitemp

from btlewrap import available_backends, BluepyBackend, GatttoolBackend, PygattBackend
from mitemp_bt.mitemp_bt_poller import MiTempBtPoller, MI_TEMPERATURE, MI_HUMIDITY, MI_BATTERY


mac_address = ""


def poll():
    """Poll data from the sensor."""
    global mac_address
    backend = BluepyBackend
    poller = MiTempBtPoller(mac_address, backend)
    print("Getting data from Mi Temperature and Humidity Sensor")
    print("FW: {}".format(poller.firmware_version()))
    print("Name: {}".format(poller.name()))
    print("Battery: {}".format(poller.parameter_value(MI_BATTERY)))
    print("Temperature: {}".format(poller.parameter_value(MI_TEMPERATURE)))
    print("Humidity: {}".format(poller.parameter_value(MI_HUMIDITY)))

# poll()

def retrieve_temp():
	global mac_address
	backend = BluepyBackend
	poller = MiTempBtPoller(mac_address, backend)
	
	temp = poller.parameter_value(MI_TEMPERATURE)
	return temp

def retrieve_humidity():
	global mac_address
	backend = BluepyBackend
	poller = MiTempBtPoller(mac_address, backend)
	
	humidity = poller.parameter_value(MI_HUMIDITY)
	return humidity
