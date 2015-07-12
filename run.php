<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, maximum-scale=1"/>
		<link rel="icon" type="image/png" href="ico.png" />
		<title>Applying Settings</title>
	</head>
	<style>
body {
	background-color:#404040;
	max-width: 900px;
  margin: auto;
  min-width: 320px;
  color:white;
}
h1   {color:#282828}
h3   {color:white; text-decoration:underline;}
p    {color:white; display:inline}

</style>
<body>
<?
@shell_exec('bash /var/www/apply.sh');
?>
<script type="text/javascript">
var count = 20;
var redirect = "index.php";

function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = "for "+count+" seconds.";
        setTimeout("countDown()", 1000);
    }else{
        window.location.href = redirect;
    }
}
</script>
<p>
New Settings are applying and services restarting, please wait
</p>
<span id="timer">
<script type="text/javascript">countDown();</script>
</span>
<br> You will be redirected to Home page.
</body>
