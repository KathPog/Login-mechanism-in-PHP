<?php
	

	
	session_start();
	
	if((isset($_SESSION['loggedin']))&&($_SESSION['loggedin']==true))
	{
		header('Location: game.php');
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

	Super gra na przeglądarkę <br/><br/>

	<a href="register.php">Register for free account!</a>
	<br/><br/>

	<form action="login.php" method="post">

		Login: <br/><input type="text" name="login"/><br/>
		Password: <br/><input type="password" name="password"/><br/><br/>
		
		<input type="submit" value="Log in">

	</form>
	
<?php
	if(isset($_SESSION['blad'])) 
	echo $_SESSION['blad'];
?>

</body>
</html>