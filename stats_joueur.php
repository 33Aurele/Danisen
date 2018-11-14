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
     <li><a href="resultats.php">Résultats</a></li>
     <li><a href="nouveau.php">Nouveau</a></li>
     <li class="selected"><a href="stats.php">Stats</a></li>
     </ul>
     </div>
     </div>
     
     <div id="site_content">

<?php
     $player = $_POST["player"];
echo "<h1> Statistiques de ";
echo $player;
echo "</h1>";

$won_fts = 0;
$lost_fts = 0;
$won_matches = 0;
$lost_matches = 0;

$handle = fopen("ft5.csv", "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    $ft_date= $data[0];
    $winner = $data[1];
    $loser  = $data[2];
    $score  = $data[3];

    if ($winner == $player) {
        $won_fts ++;
        $won_matches = $won_matches + 5;
        $lost_matches = $lost_matches + $score;
    }
    if ($loser == $player) {
        $lost_fts ++;
        $lost_matches = $lost_matches + 5;
        $won_matches = $won_matches + $score;
    }
}
fclose($handle);

echo "<b>Victoires:</b> ";
echo $won_fts;
echo "<br>";
echo "<b>Défaites:</b> ";
echo $lost_fts;
echo "<br>";
echo "<b>Matchs gagnés:</b> ";
echo $won_matches;
echo "<br>";
echo "<b>Matchs perdus:</b> ";
echo $lost_matches;

?>

<h1>Résultats</h1>
<?php
	 $date = "null";
$handle = fopen("ft5.csv", "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    if ($player == $data[1] || $player == $data[2]) {
        if($date == $data[0]) {
            echo "<li> ";
            if ($player == $data[1]) { echo "<b>✔</b> "; }
            if ($player == $data[2]) { echo "<b>✘</b> "; }
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
            if ($player == $data[1]) { echo "<b>✔</b> "; }
            if ($player == $data[2]) { echo "<b>✘</b> "; }
            echo $data[1];
            echo " <b> 5 - ";
            echo $data[3];
            echo "</b> ";
            echo $data[2];
            echo " </li>";
        }
    }
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
