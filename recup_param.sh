#! /bin/bash
# Script de récupération des param pour les afficher
rm param_recup
touch param_recup

function writeto {
  read a
  echo $a >> param_recup
}


#wifi_power
if [[ -n $(ps aux | grep "hostapd") ]]; then
  power=wifi_power:on
else
  power=wifi_power:off
fi
echo $power | writeto


#wifi
for i in { ssid= wpa_passphrase= channel= }
  do
  item=$(echo $i | sed 's/=/:/g')
  cat /etc/hostapd/hostapd.conf | grep $i | sed "s/$i//g" | sed "s/^/$item/" | sed "s/^/wifi_/"  | writeto
  done


#dchp
#range
cat /etc/dhcp/dhcpd.conf | grep range | sed -e 's/ range//g' -e 's/;//g' -e 's/\s\+/\n/g'  > tempfile.tmp
sed -e '2s/^/dhcp_begin_ip_range:/' -e '3s/^/dhcp_end_ip_range:/' tempfile.tmp >> param_recup
rm tempfile.tmp
#router_ip
cat /etc/dhcp/dhcpd.conf | grep routers | sed -e 's/ option routers //g' -e 's/;//g' > tempfile.tmp
sed -e '1s/^/router_ip:/' tempfile.tmp >> param_recup
rm tempfile.tmp
#default lease time
cat /etc/dhcp/dhcpd.conf | grep default-lease-time | sed -e 's/default-lease-time//g' > tempfile.tmp
cat tempfile.tmp | sed -e '1s/^ /dhcp_default_lease_time:/' -e 's/ //g' -e 's/;//g' >> param_recup
#max lease time
cat /etc/dhcp/dhcpd.conf | grep max-lease-time | sed -e 's/max-lease-time//g' > tempfile.tmp
cat tempfile.tmp | sed -e '1s/^ /dhcp_max_lease_time:/' -e 's/ //g' -e 's/;//g' >> param_recup
#dns1
cat /etc/dhcp/dhcpd.conf | grep domain-name-servers | sed -e 's/option domain-name-servers//g' -e 's/[,;]//g' -e 's/^  //' > tempfile.tmp
cat tempfile.tmp | sed -e 's/\s\+/\n/g' > tempfile2.tmp
cat tempfile2.tmp | sed -e '1s/^/dhcp_dns1:/' -e '2s/^/dhcp_dns2:/' >> param_recup
rm tempfile2.tmp tempfile.tmp

sed -i '/^$/d' param_recup

# sed enlever lignes vides : -e '/^$/d'
#sed -e 's/,//g' -e  's/;//g' -e  's/option //g' -e  's/\s\+/\n/g' -e  '/^$/d' param_recup > param_recup.tmp
#mv param_recup.tmp param_recup
