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
     <li class="selected"><a href="nouveau.php">Nouveau</a></li>
     <li><a href="stats.php">Stats</a></li>
     </ul>
     </div>
     </div>
     
     <div id="site_content">

     <h1> Nouveau Résultat </h1>
     <form action="nouveau_ft.php" method="post">
     Gagnant: <select name="winner">

<?php
     $handle = fopen("seedings.csv", "r");
$players = array();
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
{
    array_push($players, $data[0]);
}

fclose ($handle);
foreach ($players as $player) {
    echo '<option value="';
    echo $player;
    echo '">';
    echo $player;
    echo "</option>";
}
?>
     </select><br>
     Perdant: <select name="loser">

<?php
    foreach ($players as $player) {
        echo '<option value="';
        echo $player;
        echo '">';
        echo $player;
        echo "</option>";
    }
?>
     </select><br>
     Score du Perdant:  <select name="score">
     <option value=0>0</option>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
     </select> <br>
    Mot de passe: <input type="password" name="password"><br>
     <input type="submit" value="Soumettre ce match">
</form>

     <h1> Nouveau Joueur </h1>
     <form action="nouveau_joueur.php" method="post">
     Nom: <input type="text" name="nom"><br>
     Rang:  <select name="rang">
     <option value=0>0</option>
     <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
     <option value=4>4</option>
     <option value=5>5</option>
     </select><br>
     Mot de passe: <input type="password" name="password"><br>
     <input type="submit" value="Ajouter ce joueur">
</form>

     
</ul>
</div>
</body>
<footer>
<p></p>
</footer>
</html>
