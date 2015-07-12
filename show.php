<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, maximum-scale=1"/>
		<link rel="icon" type="image/png" href="ico.png" />
		<title>Configuration Page</title>
	</head>
	<style>
body {background-color:#404040;}
h1   {color:#282828}
h3   {color:white; text-decoration:underline;}
p    {color:white; display:inline}
</style>
<h1>Recap Page</h1>
<html>
<body>

<p>You will set these parameters : </p><br>



	<!-- WIFI -->
	<h3>WIFI</h3>
	<p>Wifi Power : <?php echo $_POST['wifi_power'];?> <br> <!--à faire correspondre sur la page de config-->
	AP's name :	<?php echo $_POST['ap_name'];?> <br>
	AP's WPA2 password :	<?php echo $_POST['wpa'];?> <br>
 	WIFI Channel :	<?php echo $_POST['wifi_channel'];?> <br>
	</p>

	<!-- TCP/IP -->
	<h3>TCP/IP</h3>
	<p>
	Router IP :	<?php echo $_POST['router_ip'];?><br>
	Netmask :	<?php echo $_POST['netmask'];?><br>
	DHCP IP range : <?php echo $_POST['begin_ip_range'];?> To <?php echo $_POST['end_ip_range'];?><br>
	Default Lease Time :	<?php echo $_POST['default_lease_time'];?><br>
	Max Lease Time :	<?php echo $_POST['max_lease_time'];?><br>
 	DNS 1 : <?php echo $_POST['dns1'];?>   DNS 2 :  <?php echo $_POST['dns2'];?><br>
	</p>

	<form action="run.php">
	  <br><br>  <input type="submit" value="Apply">
	</form>

	<!-- Write Parameters to a file that a script will read and apply to conf files -->
	<?php
	$myFile = "/var/www/NewConfig.txt";
	$fh = fopen($myFile, 'w') or die("Error : Can't open file $myFile");
	$ret .= "\r\n"; // la var ret sert à retourner à la ligne dans le fichier
	fwrite($fh,  $_POST['wifi_power']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['ap_name']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['wpa']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['wifi_channel']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['router_ip']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['netmask']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['begin_ip_range']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['end_ip_range']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['default_lease_time']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['max_lease_time']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['dns1']);
	fwrite($fh,  $ret);
	fwrite($fh, $_POST['dns2']);
	fwrite($fh,  $ret);
	fclose($fh);
	?>
</body>
</html>
