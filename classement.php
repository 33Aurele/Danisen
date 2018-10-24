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
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    $dan[$data[0]] = 0;
    $rank[$data[0]] = $data[1];
}

fclose ($handle);

$handle = fopen("ft5.csv", "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    $winner = $data[1];
    $loser = $data[2];
    $score = $data[3];
    
    $pt_diff = max(0, 2 + $rank[$winner] - $rank[$loser]);
    
    $dan[$winner] += $pt_diff;
    $dan[$loser] -= $pt_diff;
    
    if ($score == 0) { $dan[$winner] += 1; }
    
	if ($rank[$loser] == 5 && $dan[$loser] < 0) { $dan[$loser] = 0; }
    if ($dan[$loser] < -3) {
        $dan[$loser] = 0;
        $rank[$loser]++;
    }
    if ($rank[$winner] == 0 && $dan[$winner] > 4) { $dan[$winner] = 4; }
    if ($rank[$winner] >= 1 && $dan[$winner] >=4) {
        $dan[$winner] = 0;
        $rank[$winner]--;
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
            echo "</mar></li>";
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
