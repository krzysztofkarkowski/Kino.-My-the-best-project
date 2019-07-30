<?php 
session_start(); ?>
<?php include './lacz.php';?>
<html>

<head>


<title> Sesjon </title>
<link rel="stylesheet" type="text/css" href="css/css.css">
<meta charset="UTF-8"/>
</head>


<body bgcolor="Black">

         <div id="container"> 
         <div class="box1">
	
	 <ul>
	     <li><h2> <font color="WHite"  >KINO PAPIOK  </font></h2></li>
         <li><a href="index.php">Strona Głowna</a></li>
         <li><a href="cennik.php">Cennik</a></li>
         <li><a href="rejestracja.php"> Rejestracja </a> </li>
         <li><a href="kontakt.php">Kontakt</a></li>

     </ul> 

         </div>
         <div class="register-box2">
	
	
	
	
	</br>
	     <div class="register-box">
	     <div id='panel'>
<?php 
if (is_null($_SESSION['logowanie']))
{
         echo "<form method='Post' action='rejestracja.php'>
         </br> <center>
         <label>
         <p>Login:</p>
         <input type='login' id='login' name='login'> </label>
         <label>
         <p>Hasło:</p> 
         <input type='password' id='haslo' name='haslo'> </label>
         </br>
         <label><p>Powtórz Hasło:</p>
         <input type='password' id='haslo' name='returnhaslo'> </label>
         <label>
         <p> Adres email: </p>
         <input type='email' id='haslo' name='email'> </br> </br>
         <div id='lower'> </label>

         <input type='submit' value='Zajerestruj się'>
         </div> </div></form>";
}
else
{
         echo "<h1><center> Masz już konto! </center> </h1>";	
}
?>
<?php

$login=$_POST['login'];
$haslo=$_POST['haslo'];
$email=$_POST['email'];
$returnhaslo=$_POST['returnhaslo'];

if( (!empty($login)) && (!empty($haslo)) && (!empty($email))) 
{
if($returnhaslo==$haslo)
{
if ($db=lacz())
{
	 $spr = "SELECT login  FROM klienci WHERE email = '$email';";
	 $cos = $db->query($spr);	
if ($cos->num_rows==0)
{
echo "<center><h2> Zajerestrowano na Login: $login </h2></center>";
	 $zapytanie = "INSERT INTO klienci(Login,Haslo,Email) Values('$login','$haslo','$email');";	
	 $wynik = $db->query($zapytanie);
$db -> close();
}
elseif($cos->num_rows==1) 
{ 
	 echo "<center><h1>Na podanym emailu istnieje już konto</h1> </center>";} 
}
else 
	 echo "Błąd połączenia z bazą danych!";
}
else 
	 echo " <center><h1> Hasła nie są takie same!</h1></center> ";
}
else if ((($_SESSION['logowanie'])))
{
	 echo "";
}
else
{
	 echo " <center><h1> Proszę uzupełnic dane! </h1></center>";
}

?>
	 </div>
	 </div>
	 </br>
         <div class="register-box3">
	     <div class="prawa">
	 <b> Wszystkie prawa zastrzeżone Kino Papiok 2018 © </b>
	     </div>
	 <img class="logo" src="pic/logo1.png" height="60%" width="40px" />
	 <img class="logo" src="pic/insta.png" height="60%" width="40px" />
	 <img class="logo" src="pic/snap.png" height="65%" width="40px" />
	     <div class="logo">
	 <b>Znajdziesz nas na:
	     </div>
         </div>
</body>
</html>