<?php

	session_start();
	
	if(!isset($_SESSION['loggedin']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
	<title>Osadnicy - gra przeglądarkowa</title>
	
</head>
<body>

<?php

	echo "<p>Witaj ".$_SESSION['user'].'! [<a href="logout.php">Wyloguj mnie!</a>]</p>';
	echo "<p><b>Drewno</b>: ".$_SESSION['drewno'];
	echo "| <b>Kamień</b>: ".$_SESSION['kamien'];
	echo "| <b>Zboże</b>: ".$_SESSION['zboze']."</p>";
	
	echo "<p> <b>Email</b>: ".$_SESSION['email']."</p>";
	echo "<p> <b>Dni Premium</b>: ".$_SESSION['dnipremium']."</p>";
	
?>

</body>
</html>