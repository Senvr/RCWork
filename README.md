# Lil-Wolfee (offical project name)
Software for a hobbled-together RC tank (named Wolfee or "Jonny").
This is the SOFTWARE for the shit I'm doing. 

**Parts** (Not full kit just what I have right now):
Tank Chassis(\*NOTE): https://www.amazon.com/SZDoit-Chassis-Control-Platform-Graduation/dp/B07BHFM9PJ/ref=pd_sbs_21_1/135-4595457-7426542

Raspi 0w Kit (sd not included): https://www.amazon.com/Vilros-Raspberry-Starter-Power-Premium/dp/B0748MPQT4/ref=sr_1_3

L298N Motor Driver (x2): https://www.amazon.com/Qunqi-Controller-Module-Stepper-Arduino/dp/B014KMHSW6/ref=sr_1_2_sspa

Arduino Nano (ATmega328P): https://www.amazon.com/ATmega328P-Microcontroller-Board-Cable-Arduino/dp/B00NLAMS9C/ref=sr_1_13


*\*NOT What i have! I have a different one I got for a good deal. But it doesn't matter much. 
Consider:
If the chassis you have has any motor drivers (eg not stepper - though they MAY work, check your chassis and driver(s)) or is just DC two-wire motors*

*The voltage of your motors. 
Keep in mind the L298N driver has a significant voltage drop. So don't power it from the 3v3 pin on your arduino.*

**I'm not going to tell you how to wire it up, mainly because it's contained in a Sprite bottle. I excluded a lot of important peices you may need in your build. I'm going to leave that up to you. I'll post pictures of my setup and diagrams but do NOT take that as a guide.**

## Install
**Dir: monitor**
PUT STRICTLY IN `/home/pi/monitor` (or update directories in `site/` files)

**Dir: site**
Put in whatever hosting service you have (/var/www/site1 or /var/www/html/ or whatever. ADVISED: /var/www/html on NGINX)

**Dir: arduino**
Arduino code. Upload via arduino uploader. 

**Install: motion (raspi)**
If there's no script, install and configure a motion server for MJPEG. You will probably have to update `control.php` in `site/` code-wise.
Tip: Open the MJPEG stream up in a browser, inspect element and copy the code that displays the stream and replace it with the code in control.php. I'll try to comment it.

### This is developing software.
If you use this, READ THE LISENCE. This is not for beginners - you are expected to change almost every file and do things manually until I myself have a framework.
