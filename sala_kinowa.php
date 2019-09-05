<?php 
session_start();
?>
<?php include './lacz.php';?>
<html>

<head>


<title> Sesjon </title>
<link rel="stylesheet" type="text/css" href="css/sala.css">
<meta charset="UTF-8"/>
</head>


<body>
<div class="ekran">
<b>[_______________________________________________________]</b>
</div> 


<?php
$id = $_GET['n2'];
$i=1;
$miejsca=$_POST['akceptuj'];

     if (is_array($miejsca) || is_object($miejsca))
     {
     foreach($miejsca as $checkboxValue)
	 {
	
     if($i==count($miejsca))
	 {
         $tresc_zapytania=$tresc_zapytania.$checkboxValue."=1";
     }
     else
	 {
	     $tresc_zapytania=$tresc_zapytania.$checkboxValue."=1,";
     }
$i++;
     }
     }
$name = ($_SESSION['logowanie']);
$zlicz=count($miejsca);
	
	if ($db=lacz() )
	{
	if ( $zlicz <'5')
	{
	     $zapytanie = "UPDATE sale SET $tresc_zapytania  where id_seansu = $id ;";
	
	     $wynik = $db->query($zapytanie);
	}
	else
	{
		 echo "Za dużo wybrane!";
	}
$ilosc = count($miejsca);
$k = 20;
$cena = $ilosc*$k; 
$zapytanie3 = "select tytul from filmy where id_filmu = $id ;";
$wynik3 = $db->query($zapytanie3);
	
	if ($wynik3->num_rows ) 
	{
	     while($rekord3 = $wynik3->fetch_object() )
		 {
	     $tytul=$rekord3 -> tytul ;
	     }
	}
         $pyk='miejscaifilm'.$id;
	 
	     $danee=$tytul.". [ Twoje Miejsca: ".$tresc_zapytania." ]   [ Cena biletów:  ".$cena."zł ]. ";
	 
	if (!empty($tresc_zapytania)&& $zlicz <'5' )
	{
	     $zapytanie2 = "UPDATE klienci SET  $pyk = '$danee'   where login= '$name' ;";
	
	     $wynik2 = $db->query($zapytanie2);
	}
	else
	{
		echo "<div class='info'><b>Tutaj można rezerwować bilety!</b> </div>";
	}
	 
	    $zapytanie1 = "Select * From Sale where id_seansu = $id  ;";
	
	    $wynik1 = $db->query($zapytanie1);
	 

	if ($wynik1->num_rows )
	{
	     while($rekord1 = $wynik1->fetch_object() )
		 {
		
    $tablica[1] = $rekord1 -> A1;  $tablica[2] = $rekord1 -> A2;  $tablica[3] = $rekord1 -> A3;  $tablica[4] = $rekord1 -> A4;
	$tablica[5] = $rekord1 -> A5;  $tablica[6] = $rekord1 -> A6;  $tablica[7] = $rekord1 -> A7;  $tablica[8] = $rekord1 -> A8;
	$tablica[9] = $rekord1 -> A9;  $tablica[10] = $rekord1 -> A10;  $tablica[11] = $rekord1 -> A11;  $tablica[12] = $rekord1 -> A12;
	$tablica[13] = $rekord1 -> A13;  $tablica[14] = $rekord1 -> A14;  $tablica[15] = $rekord1 -> A15;  $tablica[16] = $rekord1 -> A16;
	$tablica[17] = $rekord1 -> A17;  $tablica[18] = $rekord1 -> A18;  $tablica[19] = $rekord1 -> A19;  $tablica[20] = $rekord1 -> A20;  
	$tablica[21] = $rekord1 -> A21;  $tablica[22] = $rekord1 -> A22;  $tablica[23] = $rekord1 -> A23;  $tablica[24] = $rekord1 -> A24;
	$tablica[25] = $rekord1 -> A25;  $tablica[26] = $rekord1 -> A26;  $tablica[27] = $rekord1 -> A27;  $tablica[28] = $rekord1 -> A28;
	$tablica[29] = $rekord1 -> A29;  $tablica[30] = $rekord1 -> A30;  $tablica[31] = $rekord1 -> A31;  $tablica[32] = $rekord1 -> A32;
	$tablica[33] = $rekord1 -> A33;  $tablica[34] = $rekord1 -> A34;  $tablica[35] = $rekord1 -> A35;  $tablica[36] = $rekord1 -> A36;
	$tablica[37] = $rekord1 -> A37;  $tablica[38] = $rekord1 -> A38;  $tablica[39] = $rekord1 -> A39;  $tablica[40] = $rekord1 -> A40;
	$tablica[41] = $rekord1 -> A41;  $tablica[42] = $rekord1 -> A42;  $tablica[43] = $rekord1 -> A43;  $tablica[44] = $rekord1 -> A44;
	$tablica[45] = $rekord1 -> A45;  $tablica[46] = $rekord1 -> A46;  $tablica[47] = $rekord1 -> A47;  $tablica[48] = $rekord1 -> A48;
	$tablica[49] = $rekord1 -> A49;  $tablica[51] = $rekord1 -> A51;  $tablica[52] = $rekord1 -> A52;  $tablica[53] = $rekord1 -> A53;
	$tablica[54] = $rekord1 -> A54;
	
	     }
	}
	}
	else 
	{
			echo "something wrong";
	}
		
$db -> close(); 

?>

     <div class="rzadA">
     <form action="" method="POST">
     <div class="numbers"> 1 2 3 4 5 6 7 8 9 </div>
<?php

for ( $x = 1 ; $x <= 54 ; $x++ )
{
	 $a++;
	 $dane='A'.$a;
	echo"<div class='position'>";
	 if($tablica[$a]==1){echo "<div class='siedzeniez'>";} else {echo "<div class='siedzenie'>";} echo "<input hidden type='checkbox' id=$dane name='akceptuj[]' value=$dane "; if($tablica[$a]==1){echo "disabled";}   echo "/>"; if($tablica[$a]==0)echo"<label for=$dane > </label>";echo"  </div>";
	echo"</div>";
}

if ($db=lacz())
{
	 $zapytanie5 = "Select $pyk from klienci where login = '$name';";
	 $wynik5 = $db->query($zapytanie5);
	
if ($wynik5->num_rows ) 
{
	 while($rekord5 = $wynik5->fetch_object() )
	 {
		 $spr = $rekord5 -> $pyk ;


     }
}
}
if(empty($spr))
{
     echo "<p><h2><font color='magneta'> Potwierdzenie.zapoznania się z regulaminem!</h2> </p>

     <b>Zaznacz:</b></font>  <input type='checkbox' id='myCheck'  onclick='myFunction()'>

     <p id='text' style='display:none'><Input type='Submit' value=  'ZAREZERWUJ BILETY!' ></p> "; 
}
else 
{
	 echo "</br></br> </br> <h2><font color='magneta'> Zarezerwowałeś już bilety na ten film! </font> </h2>";
}
?>


     <script>
         function myFunction()
		     {
             var checkBox = document.getElementById("myCheck");
             var text = document.getElementById("text");
         if (checkBox.checked == true)
		 {
             text.style.display = "block";
         } 
	     else
		 {
             text.style.display = "none";
         }
             }
     </script>
     </form>
     </div>
<?php
$haslo=$_POST['haslo'];
$email=$_POST['email'];
     
	 if ($db=lacz())
	 {
	     $zapytanie = "Select b.value ,b.value2, s.Dzień1 , s.Godzina_Rozpoczecia1, f.tytul from bilety as b 
	     INNER JOIN Seanse as s ON s.Id_Seansu = b.Id_Seansu 
	     INNER JOIN filmy as f ON f.id_Filmu = s.Id_Filmu where s. Id_Filmu=$id;";
	
	 $wynik = $db->query($zapytanie);
	
	if ($wynik->num_rows ) 
	{
	     while($rekord = $wynik->fetch_object() )
		 {
	 echo " <div class='box'> <p> <a> <center> " ;
		 
     echo "<b><h1>";

     $tytul=$rekord -> tytul ;
     echo $tytul;
     echo "</h1> Zalogowano: ";
     echo   ($_SESSION['logowanie']) ;
     echo "</br> Wybrano ";
     echo count($miejsca);
     echo " Miejsc </br>";
     echo "Twoje Miejsca to: ";
     echo $tresc_zapytania;
     echo "</br>";
	 echo" </br></a> Data: ";
	 echo $rekord -> Dzień1;
	 echo "<b></br> Godzina:  ";
	 echo $rekord -> Godzina_Rozpoczecia1; 
	 echo "</b>  ";
	 echo "</br> Bilet Normalny: ";
	 echo $rekord -> value; 
	 echo "zł </br> Bilet Ulgowy: ";
	 echo $rekord -> value2; 
	 echo "</br></br></br></br>";
	 echo"<a href='index.php'>Strona Główna</a></br></br>";
	 echo "<font color='red'> Przeczytaj uważnie!! </font></br>";
	 echo"<a href='regulamin.php'>Regulamin</a>";
	 echo "</div>";   
     echo "</p>
      </div> ";
	 }
	 }
$db -> close();
	}
?>

</body>
</html>
