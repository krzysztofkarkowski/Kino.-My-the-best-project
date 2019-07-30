<?php 
session_start();
?>
<html>

<head>
<title> Sesjon </title>
<link rel="stylesheet" type="text/css" href="css/css.css">
<meta charset="UTF-8"/>
</head>
<body bgcolor="Black">

<?php 

if(isset( $_POST['login']) && isset( $_POST['haslo']))
{

$iduzytkownika = $_POST['login'];
$haslo = $_POST['haslo'];
}
$bd_lacz = new mysqli('localhost','root','','kino');

if(mysqli_connect_errno()) 
{
	echo 'Połączenie z bazą danych nie powiodło się: '.mysqli_connect_error();
	exit();
}
$zapytanie = "select * from klienci where name = '$iduzytkownika' and nazwisko='$haslo';";

$wynik=$bd_lacz -> query($zapytanie);

if ($wynik -> num_rows == 1)
{
	$_SESSION['logowanie'] = $iduzytkownika;
    
	}
	
$bd_lacz -> close ();



?>
<div id="container">
    <div class="box1">
	
	<ul>
	<li><h2> <font color="WHite"  >KINO PAPIOK  </font></h2></li>
<li><a href="index.php">Strona Głowna</a></li>
  <li><a href="default.asp">Repertuar</a></li>
  
  <li><a href="zapwiedz.html">Cennik</a></li>
  <li><a href="zalog.php">Zaloguj Się</a></li>
  <li><a href="rejestr.html"> Rejestracja </a> </li>
  <li><a href="about.asp">Kontakt</a></li>

	

</ul> 

 </div>
    <div class="box2"><?php
if (!isset($_SESSION['logowanie']))
echo "</br> </br>";
echo "<div id='panel'>
<form method='Post' action='zalog.php'>
 <label for='username'>Nazwa użytkownika:</label>
<input type='text' id='login' name='login'>
<label for='password'>Hasło:</label>

<input type='password' id='haslo' name='haslo'>
<div id='lower'>

<input type='submit' value='Login'>
</div> </div>";


?> 
<h2> <font color="red" ><center> Po zalogowaniu się otrzymasz dostęp do rezerwacji biletów na seanse! </font> </h2>
</div>
    <div class="box3">
	<?php


if(!isset($_SESSION['logowanie']))
{

Echo "Zawartość dostępna po zalogowaniu";
}
else 
{
	header('Location:vip.php');
	
}
?>
	</div>
</div>


<center>





</br>
</br>
</br>
</br>


</form>
</form>
</body>
</html>