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


<body >


 </div>
    <div class="box2">
	</BR>
	 <?php


if ($db=lacz()){
    
	$zapytanie = "SELECT regulamin_rez FROM regulamin;";
	$wynik = $db->query($zapytanie);
	
	if ($wynik->num_rows) {
	 while($rekord = $wynik->fetch_object()){
 
	echo " <div class='boxkontakt'>
      
	
  <p>
   <a><h1>  " ;

	echo $rekord -> regulamin_rez; 
	echo "</br> </br>";

		 echo"<a href='index.php'>Powrót do Strony Kina!</a>";
	   
  echo "</h1></p>
</div> ";
	 }
	 
	
	 }
$db -> close();
	}
	?>

	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
   
	
  


 

</div>














</body>
</html>