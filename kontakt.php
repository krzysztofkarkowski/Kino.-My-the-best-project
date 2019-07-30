<?php 
session_start();
?>
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
         <div class="box2">
	 </BR>
<?php

if ($db=lacz())
{    
	 $zapytanie = "SELECT Tele,Adres,Email,Opis FROM kontakt;";
	 $wynik = $db->query($zapytanie);
	
if ($wynik->num_rows)
{
	 while($rekord = $wynik->fetch_object())
	{
     echo " <div class='boxkontakt'>
     <p>
     <a>  " ;
     echo "<div id='Opiskontakt'>";
     echo "<b> Numer kontaktowy: </b>";
	 echo $rekord -> Tele; 
	 echo" </br></a>";
	 echo "<b>Adres kina: </b>";
	 echo $rekord -> Adres; 
	 echo "</br>  ";
     echo "<b>Email kina:</b> ";
	 echo $rekord -> Email;
	 echo "</br></br><b>  ";
	 echo $rekord -> Opis;
	 echo "</br>";
	 echo "</b>   ";
	 echo "</div>";  
     echo "</p>
         </div> ";
	}
	 
	
}
$db -> close();
}
?>	

	<div class="mapouter"><div class="gmap_canvas"><iframe width="450" height="350" id="gmap_canvas" 
	src="https://maps.google.com/maps?q=Szamotu%C5%82y&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
	</iframe><a href="https://www.crocothemes.net"></a></div>
	<style>.mapouter{text-align:right;height:400px;width:500px;margin-left:35%; margin-top:-300px;}.gmap_canvas 
	{overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
	
	 </div>
     </div>

     <div class="box3">
	 <div class="prawa">
	     <b> Wszystkie prawa zastrzeżone Kino Papiok 2018 © </b>
	 </div>
	     <img class="logo" src="pic/logo1.png" height="65%" width="40px" />
	     <img class="logo" src="pic/insta.png" height="65%" width="40px" />
	     <img class="logo" src="pic/snap.png" height="65%" width="40px" />
	 <div class="logo">
	     <b>Znajdziesz nas na: </b>
	 </div>
     </div>

</body>
</html>