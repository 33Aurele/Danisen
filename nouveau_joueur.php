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

if ($_POST["password"] == "PLAYER_PASSWORD") {     
    $current = file_get_contents('seedings.csv');
    $current .= "\n";
    $current .= $_POST["nom"];
    $current .= ",";
    $current .= $_POST["rang"];
    
    file_put_contents('seedings.csv', $current);
    
    echo "Ce nouveau joueur, ";
    echo $_POST["nom"];
    echo ", a été ajouté au rang ";
    echo $_POST["rang"];
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
