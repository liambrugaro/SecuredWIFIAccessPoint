
#!/bin/bash
# point d'accès avec accès sécurisé à l'Internet
# fait pour Raspberry Pi

####script config#######
log=/var/log/AP.log
dir=/etc/AP
########################
ent=$*

#fonctions
function entry {
  case $ent in
start|restart ) service_start ;;
stop ) service_stop ;;
* ) exit 0;;
  esac
}

function first_launch {  ## f à refaire entièrement
  mkdir $dir
  touch $dir/first
if [[  $(cat $dir/first) == "0" ]]; then
	echo 1 > $dir/first
	# copier les fichiers de config de hostapd et dhcpd
	entry			

fi

}

function service_start {
hostapd_control on
led on
}

function service_stop {
hostapd_control off
led off
}

function led { 
#trap "echo \"17\" >/sys/class/gpio/unexport" EXIT
#        echo "17" >/sys/class/gpio/export
# echo "out" >/sys/class/gpio/gpio17/direction

 gpio mode 0 out
  if [ $1 == "on" ];then

	gpio write 0 1
#	echo "out" >/sys/class/gpio/gpio17/direction
#	echo "1" >/sys/class/gpio/gpio17/value
  elif [ $1 == "off" ];then
 #       echo "0" >/sys/class/gpio/gpio17/value  
 	 gpio write 0 0
  fi
}

function hostapd_control {
 if [ $1 == "on" ];then
	#killall hostapd
        service hostapd restart
	service isc-dhcp-server restart
  elif [ $1 == "off" ];then
        service hostapd stop
        service isc-dhcp-server restart

	#killall hostapd
  fi
}
##########





##------------Debut du prog-------------##
#first_launch
entry


