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
     <li class="selected"><a href="classement.php">Classement</a></li>
     <li><a href="regles.html">Règles</a></li>
     <li><a href="resultats.php">Résultats</a></li>
     <li><a href="nouveau.php">Nouveau</a></li>
     <li><a href="stats.php">Stats</a></li>
     </ul>
     </div>
     </div>
     
     <div id="site_content">

<?php
     $handle = fopen("seedings.csv", "r");
$rank = array();
$dan = array();
$rank_change = array();
$date = "null";

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    $dan[$data[0]] = 0;
    $rank[$data[0]] = $data[1];
    $rank_change[$data[0]] = 0;
}

fclose ($handle);

$handle = fopen("ft5.csv", "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    $ft_date= $data[0];
    $winner = $data[1];
    $loser  = $data[2];
    $score  = $data[3];

    if ($date != $ft_date) {
        $date = $ft_date;
        foreach ($rank as $player => $r) {
            $rank_change[$player] = 0;
        }
    }   
    
    $pt_diff = max(0, 2 + $rank[$winner] - $rank[$loser]);
    
    $dan[$winner] += $pt_diff;
    $dan[$loser] -= $pt_diff;
    
    if ($score == 0) { $dan[$winner] += 1; }
    
	if ($rank[$loser] == 5 && $dan[$loser] < 0) { $dan[$loser] = 0; }
    if ($dan[$loser] < -3) {
        $dan[$loser] = 0;
        $rank[$loser]++;
        $rank_change[$loser] --;
    }
    if ($rank[$winner] == 0 && $dan[$winner] > 4) { $dan[$winner] = 4; }
    if ($rank[$winner] >= 1 && $dan[$winner] >=4) {
        $dan[$winner] = 0;
        $rank[$winner]--;
        $rank_change[$winner] ++;
        }
}

fclose ($handle);

echo "<h1> Classement </h1>";
for ($i = 0; $i <= 5; $i++) {
    echo "<h2> Rang ";
    echo $i;
    echo "</h2>";
    echo "<ul>";
    foreach ($rank as $player => $r) {
        if ($r == $i) {
            echo "<li> ";
            echo $player;
            echo " <mark>";
            echo $dan[$player];
            echo "</mark>";
            if ($rank_change[$player] > 0) { echo " ▲"; }
            if ($rank_change[$player] < 0) { echo " ▼"; }
            echo "</li>";
        }
    }
    echo "</ul>";
} 


?>
</ul>
</div>
</body>
<footer>
<p></p>
</footer>
</html>
