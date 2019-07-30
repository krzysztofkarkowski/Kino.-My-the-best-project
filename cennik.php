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
         $zapytanie = "SELECT Nazwa_Produktu,Cena_Produktu,Zdj_Produktu,Opis_Produktów FROM cennik;";
	     $wynik = $db->query($zapytanie);
	
if ($wynik->num_rows) 
{
	     while($rekord = $wynik->fetch_object()){
 
	     echo " <div class='cennikbox'>
         <p>
         <ul>
         <li> <a>  " ;
         echo "<div id='title'>";
	     echo $rekord -> Nazwa_Produktu; 
         echo "</div>";
		 echo" </a></li>";
	     echo "</ul>";
         echo $rekord -> Zdj_Produktu; 
	     echo "<div id='cennikOpis'>";
		 echo "<b>  ";
         echo $rekord -> Opis_Produktów;
	     echo "</br>";
         echo "<div id='cena'> ";
         echo $rekord -> Cena_Produktu;
	     echo "</div>";
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
	     </div>
	 </section>
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