<?php 
session_start();
?>
<?php include '/lacz.php';?>
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
if ($db=lacz())
    {
         $zapytanie = "select * from klienci where Login = '$iduzytkownika' and Haslo='$haslo';"; 
         $wynik=$db -> query($zapytanie);

if ($wynik -> num_rows == 1)
    {
	     $_SESSION['logowanie'] = $iduzytkownika;  
    }
	
$db -> close ();
    }

?>

     <div id="container"> 
         <div class="box1">
	
	<ul>
	    <li>
		      <h2> <font color="WHite"  >KINO PAPIOK  </font></h2></li>
        <li>  
		      <a href="index.php">Strona Głowna</a></li>
        <li> 
		      <a href="cennik.php">Cennik</a></li>
        <li>
		      <a href="rejestracja.php"> Rejestracja </a> </li>
        <li>  <a href="kontakt.php">Kontakt</a></li>

    </ul> 

         </div>
         <div class="box2">
	</BR>
	
     <section class="card">
         <div class="box">
         <div class="gora">
	  
             <img class="mySlides" src="pic/promo.jpg" height="100%" width="100%"  /> 
		     <img class="mySlides" src="pic/karnet.jpg" height="100%" width="100%"  /> 
         </div>
	
	
    </div>
	 <?php


if ($db=lacz()){
	 $i= 0;
	      $zapytanie = "SELECT Tytul,Reżyser,Rok_Produkcji,Czas_Trwania,Opis,Pic FROM filmy";
	      $wynik = $db->query($zapytanie);
if ($wynik->num_rows ) {
	      while($rekord = $wynik->fetch_object() ){
          $i++;
	      $zapytanie1 = " Select dzień1 , godzina_rozpoczecia1, id_filmu from seanse where id_filmu=$i;";
	      $wynik1 = $db->query($zapytanie1);
	      $wynik1->num_rows;
	      $rekord1 = $wynik1->fetch_object();
	 echo " <div class='box'>
	     <p>
	         <ul>
                 <li> 
	                 <a>  " ;
     echo "<div id='title'>";
	 echo $rekord -> Tytul; 
	
     echo "</div>";
	 echo" </a></li>";
	 echo "</ul>";
	 echo "<div class='Pic'>";
	 echo $rekord -> Pic;
	 echo "</div>";
	 echo "<div id='Opis'>";
	
	 echo "<b>  ";
	 echo $rekord -> Opis; 
	 echo "</b>  ";
	 echo "</br>";
	     $id = $rekord1 -> id_filmu;
if (!empty($_SESSION['logowanie']))
	{
		 echo "  <a href='sala_kinowa.php?n2=$id' onclick='myFunction()'>
		 <font color='red'><b>Kliknij By Zarezerwować Bilet!</b> </font></a> ";
	}
else 
	{
		 echo "  
		 <font color='red'><b>Zaloguj się w celu rezerwacji biletu!</b> </font></a> ";
	}
	/*if (!empty($_SESSION['logowanie']))
	{
 echo "<script> function myFunction() {
    alert ('Możesz rezerwować bilety!');  // okno informacyjne 
}</script>";
	}
	else if (empty($_SESSION['logowanie']))
	{
		echo "<script>function myFunction() { ";
		echo "alert ('Zaloguj się aby korzystać z rezerwacji!'); }  </script>";
	}*/ 
	 echo "</div>";
	 echo "<div id='dol'>";
     echo "Czas trwania filmu:  " ;
	 echo $rekord -> Czas_Trwania; 
	 echo "h";
	 echo "</br>";
	 echo "Rok Produkcji:  ";
	 echo $rekord -> Rok_Produkcji; 
	 echo "r.";
	 echo "</br>";
	 echo "Reżyseria:  " ;
	 echo $rekord -> Reżyser;
	 echo "</div>";
	 echo "<div id='dol-2'>";
	 echo "<b> Data: </b>"; 
     echo "<b style='margin-left:75px;'> Godzina: </b>";
     echo "</br> <b>";
     echo $rekord1 -> dzień1; 
     echo " </b><b style='margin-left:28px;'>";
     echo $rekord1 -> godzina_rozpoczecia1; 
	 echo "</b>";
     echo "</br> <b>"; 
	 echo "</div>";
     echo "</p> </div> ";
	 }
	 
	
	 }
$db -> close();
	}
	?>
	<div class="right-box">
	<?php
if (!isset($_SESSION['logowanie']))
{
     echo "</br> </br>";
     echo "<div id='panel'>
     <form method='Post' action='index.php'>
         <label for='username'>Nazwa użytkownika:</label>
             <input type='text' id='login' name='login'>
             <label for='password'>Hasło:</label>
			 <input type='password' id='haslo' name='haslo'>
          <div id='lower'>

             <input type='submit' value='Login'>
          </div> </div></form>";
}
else 
{
	 echo  "<label for='username'> Zalogowany Użytkownik: </br> <center>    " ;
	 echo "<b>";
     echo   $_SESSION['logowanie'] ;
	 echo "</br></br>";
	 echo " <a href='twojebilety.php'><font color='red'> Zobacz Swoje Rezerwacje! </font> </a>";
     echo "</label></br> <div id='lower'> <div id='wylog'>  <a href='wylog.php'> Wylogowanie </a> </div> </div></center> ";
}
if ($db=lacz())
{
	$zapytanie = "SELECT Pic2 FROM filmy";
	$wynik = $db->query($zapytanie);
if ($wynik->num_rows)
{
	     while($rekord = $wynik->fetch_object()){
     echo "<div id='pic2'>";
     echo $rekord -> Pic2; 
     echo "</div>";
}	
}
$db -> close();
}
?> 
	  </div>
      </section>
      <script>
         var myIndex = 0;
         carousel();

     function carousel() 
	 {
         var i;
         var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) 
	{
         x[i].style.display = "none";  
    }
         myIndex++;
         if (myIndex > x.length) {myIndex = 1}    
         x[myIndex-1].style.display = "block";  
         setTimeout(carousel, 10000);
}
     </script>
      </div>
      <div class="box3">
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