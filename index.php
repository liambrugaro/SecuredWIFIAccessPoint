<?php
include("fonction.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, maximum-scale=1"/>
		<link rel="icon" type="image/png" href="ico.png" />
		<title>Configuration Page</title>
		<link async="" rel="stylesheet" href="base.css">
	</head>


<body>
	<div id="ban"><span id="titre">Configuration Page of AP script</span></div>
	<?php //va chercher les paramètres pour les afficher sur la page
	@shell_exec('bash /var/www/TEST/recup_param.sh');
	?>


	<!-- WIFI -->
	<div id="corps">
		<p> Your IP Address is: <?php echo $_SERVER["REMOTE_ADDR"]; ?> </p> <br>
		<div class="sousTitre">WIFI</div>

		<p>Wifi Power : <input type="checkbox" name="wifi_power" <?php if(getValeur("wifi_power")==="on"){echo "checked=\'checked\'";}?>/>
		 <br> <!--à faire correspondre sur la page de config-->
		AP's name : <input value="<?php echo getValeur("wifi_ssid");?>"/> <br>
		AP's WPA2 password : <input value="<?php echo getValeur("wifi_wpa_passphrase");?>"/> <br>
		WIFI Channel :	<SELECT name="Channel" size="1">
		<?php
		  for($i = 1;$i<12;$i++)
			{
				$check ="";
				if ($i == getValeur("wifi_channel"))
				{
					$check = "selected";
				}
				echo '<OPTION value="'.$i.'"'. $check .'>'.$i.'</option>';
			}
			?>
		</SELECT>
		<br>
		</p>

		<!-- TCP/IP -->
		<div class="sousTitre">TCP/IP</div>
		<p>
		Router IP :	<input value="<?php echo getValeur("router_ip");?>"/><br>
		DHCP IP range : <input value="<?php echo getValeur("dhcp_begin_ip_range");?>"/> To <input value="<?php echo getValeur("dhcp_end_ip_range");?>"/><br>
		Default Lease Time :	<input value="<?php echo getValeur("default_lease_time");?>"/><br>
		Max Lease Time :	<input value="<?php echo getValeur("max_lease_time");?>"/><br>
		DNS 1 : <input value="<?php echo getValeur("dns1");?>"/>   DNS 2 :  <input value="<?php echo getValeur("dns2");?>"/><br>
		</p>
		</div>
<button class="btn" type="button"><span>Apply !</span></button>



<footer>
  <p>2015 - V1 -  <a href="https://github.com/liambrugaro/SecuredWIFIAccessPoint">
  Our GitHub !</a></p>
</footer>

</body>
</html>
