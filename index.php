<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Configuration Page</title>
	</head>
	<style>
body {background-color:#404040;}
h1   {color:#282828}
h3   {color:white; text-decoration:underline;}
p    {color:white; display:inline}
</style>
	<h1>Configuration Page of AP script</h1>
	<body>


<!-- Parameters user can change -->
<form action="show.php" method="post">

		<!-- WIFI -->
	<h3>WIFI</h3><p>Wifi Power : <select name="Wifi">
<option value="on">On</option>
<option value="off">Off</option><br>
	</select></p><br>
	<p>AP's name :	</p><input type="text" name="ap_name"/><br>
	<p>AP's WPA2 password :	</p><input type="text" name="wpa"/><br><br>
	<p>AP's WIFI Channel :	</p><input type="text" name="wifi_channel"/><br><br>

	<!-- TCP/IP -->
	<h3>TCP/IP</h3>
	<p>Router IP	</p><input type="text" name="router_ip"/><br>
	<p>Netmask	</p><input type="text" name="netmask"/><br><br>
	<p>DHCP IP range :<br>Actual Range : 10.10.10.20-10.10.10.80<br> From (eg. 10.10.10.0) <input type="text" name="begin_ip_range"/> To (eg. 10.10.10.254)	<input type="text" name="end_ip_range"/></p><br><br>
	<p>DHCP default lease time :	</p><input type="text" name="default_lease_time"/><br><br>
	<p>DHCP max lease time :	</p><input type="text" name="max_lease_time"/><br><br>
	<p>DNS 1 :	</p><input type="text" name="dns1"/>	<p>DNS 2 :	</p><input type="text" name="dns2"/><br><br>



	<input type="submit" value="Submit">
<!--/end/ Parameters user can change -->

</form>
	</body>
</html>
