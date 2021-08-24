#!/bin/bash

cd /home/pi/rpi-daemon

node index.js > /home/pi/error.log 2>&1 &
