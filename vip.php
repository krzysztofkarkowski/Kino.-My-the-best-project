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


if(!isset($_SESSION['logowanie']))
{

Echo "Zawartość dostępna po zalogowaniu";
}
else 
{
	
	echo "<div id='container'>  <div class='box1'><ul><li><h2> <font color='WHite'  >KINO PAPIOK  </font></h2></li>";  
	echo"<li><a href='index.php'>Strona Głowna</a></li>";
	echo "<li><a href='default.asp'>Repertuar</a></li>";
 
  echo "<li><a href='zapwiedz.html'>Zapowiedzi</a></li>";
   echo "<li><a href='news.html'>Cennik</a></li>";
    echo "<li><a href='zalog.php'>Zaloguj Się</a></li>";
  echo "<li><a href='rejestr.html'> Rejestracja </a> </li>";
 
echo "<li><a href='about.html'>Kontakt</a></li></li> </ul> ";
	
   echo " </div> <div class='box2'>";
   echo  " Zalogowany Użytkownik     " ;
	
   echo   $_SESSION['logowanie'] ;

	echo " <center></br> <center>Brawo możesz korzystać ze strony dla zalogowanych! </br>";
	echo "</center> <a href='wylog.php'> Wylogowanie </a> ";
	echo"</div><div class='box3'>trzy</div>
</div>";
}
?>





</body>
</html>