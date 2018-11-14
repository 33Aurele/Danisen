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

     <h1> Statistiques Générales </h1>
<?php
     $handle = fopen("ft5.csv", "r");
$fts = 0;
$matches = 0;
$loser_score = array(0,0,0,0,0);
$num_players = 0;

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    $ft_date= $data[0];
    $winner = $data[1];
    $loser  = $data[2];
    $score  = $data[3];
    
    $fts ++;
    $matches = $matches + 5 + $score;
    $loser_score[$score] ++;
}
fclose($hande);
$handle = fopen("seedings.csv", "r");
$players = array();
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    array_push($players, $data[0]);
    $num_players ++;
}

fclose ($handle);


echo "<b>Nombre de FT5s:</b> ";
echo $fts;
echo "<br>";
echo "<b>Nombre de matchs:</b> ";
echo $matches;
echo "<br>";
echo "<b>Nombre de joueurs:</b> ";
echo $num_players;

?>
<h1> Statistiques de joueur</h1>
<form action="stats_joueur.php" method="post">
<select name="player">
    <?php
     
foreach ($players as $player) {
    echo '<option value="';
    echo $player;
    echo '">';
    echo $player;
    echo "</option>";
}
?>
<input type="submit" value="Stats">
</form>

</ul>
</div>
</body>
<footer>
<p></p>
</footer>
</html>
