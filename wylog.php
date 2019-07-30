<?php 
session_start();
?>
<html>

<head>
<title> Sesjon </title>
<meta charset="UTF-8"/>
</head>
<body>

<?php 

if (isset($_SESSION['logowanie']))
{
Unset($_SESSION['logowanie']);

Session_destroy();
header('Location:index.php');
}
else
	{
		echo " '<center>' Błędny login lub hasło";
	}
?>









</body>
</html>