<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}
	
	require_once "connect.php";

	$connection = @new mysqli($host, $db_user, $db_passwrod, $db_name);
	
	if ($connection->connect_error!=0)
	{
		echo "Error".$connection->connect_error;
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$password = htmlentities($password, ENT_QUOTES, "UTF-8");
		
		if ($result = @$connection->query(
		sprintf("SELECT*FROM uzytkownicy WHERE user='%s' AND pass='%s'",
		mysqli_real_escape_string($conncection,$login),
		mysqli_real_escape_string($connection,$password))))
		{
			$how_many_users = $result->num_rows;
			if($how_many_users>0)
			{
				
				$_SESSION['loggedin'] = true;
				$row = $result->fetch_assoc();
				$_SESSION['id'] = $row['id'];
				$_SESSION['user'] = $row['user'];
				$_SESSION['drewno'] = $row['drewno'];
				$_SESSION['kamien'] = $row['kamien'];
				$_SESSION['zboze'] = $row['zboze'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['dnipremium'] = $row['dnipremium'];
				
				unset($_SESSION['blad']);
				$result->free_result();
				header('Location: game.php');
			}
			else
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło! </span>';
				header('Location: index.php');
			}
			
		}
		
		$connection->close();
	}

	
	

?>