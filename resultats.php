<!DOCTYPE HTML>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
     
     <head>
     <title>3.3 Danisen</title>
     <link rel="stylesheet" type="text/css" href="style.css" />
     <meta name="robots" content="noindex, nofollow">
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
     </head>
     
     <body>
     <div id="main">
     <div id="header">
     <div id="logo">
     <h1><a href="classement.php"><span class="logo_colour">3.3 Danisen</span></a></h1>
     <h2>Ça dose à Rennes!</h2>
     </div>
     <div id="menubar">
     <ul id="menu">
     <li><a href="classement.php">Classement</a></li>
     <li><a href="regles.html">Règles</a></li>
     <li class="selected"><a href="resultats.php">Résultats</a></li>
     <li><a href="nouveau.php">Nouveau</a></li>
     <li><a href="stats.php">Stats</a></li>
     </ul>
     </div>
     </div>
     
     <div id="site_content">
     
     <h1> Résultats </h1>
     <ul>
<?php
	 $date = "null";
$handle = fopen("ft5.csv", "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    if($date == $data[0]) {
        echo "<li> ";
        echo $data[1];
        echo " <b> 5 - ";
        echo $data[3];
        echo "</b> ";
        echo $data[2];
        echo " </li>";
    }
    else {
        $date = $data[0];
        echo "</ul>";
        echo "<h2> ";
        echo $date;
        echo "</h2>";
        echo "<ul>";
        echo "<li> ";
        echo $data[1];
        echo " <b> 5 - ";
        echo $data[3];
        echo "</b> ";
        echo $data[2];
        echo " </li>";
    }
}
fclose($handle);

$handle = fopen("seedings.csv", "r");
echo "</ul>";
echo "<h2> Seedings </h2>";
echo "<ul>";

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
{
    echo "<li> ";
    echo $data[0];
    echo " - Rang ";
    echo $data[1];
    echo "</li>";
}
fclose($handle);
?>
</ul>
</div>
</body>
<footer>
<p></p>
</footer>
</html>
