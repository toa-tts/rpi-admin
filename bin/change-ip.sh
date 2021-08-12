#!/bin/bash

sudo cp /home/pi/rpi-admin/etc/network /etc/network/interfaces.d/eth0

if [ -s /etc/network/interfaces.d/eth0 ]
then
    sudo systemctl disable dhcpcd
    sudo systemctl enable networking
else
    sudo systemctl enable dhcpcd
    sudo systemctl disable networking
fi

sudo reboot
