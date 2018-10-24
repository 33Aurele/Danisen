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

<?php

date_default_timezone_set('Europe/Paris');

if ($_POST["password"] == "FT_PASSWORD") {
    $current = file_get_contents('ft5.csv');
    $current .= "\n";
    $current .= date('d/m/Y');
    $current .= ",";
    $current .= $_POST["winner"];
    $current .= ",";
    $current .= $_POST["loser"];
    $current .= ",";
    $current .= $_POST["score"];
    
    
    file_put_contents('ft5.csv', $current);
    
    echo "Ce nouveau match a été ajouté! <br>";
    echo $_POST["winner"];
    echo " a gagné contre ";
    echo $_POST["loser"];
    echo ", 5 à ";
    echo $_POST["score"];
} else {
    echo "Mauvais mot de passe";
}

?>



</ul>
</div>
</body>
<footer>
<p></p>
</footer>
</html>
