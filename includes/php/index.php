<?php

$retour_categ = $bdd->query("SELECT * FROM categorie ORDER BY id");
while($donnees_categ = $retour_categ->fetch(PDO::FETCH_ASSOC)) // On lit les entrées une à une grâce à une boucle
   {
        echo "<div class='categorie'>"
            . "<div class='navbarCategorie'><h3>".$donnees_categ['titre']."</h3></div>";
        $retour_forum = $bdd->query("SELECT * FROM forum WHERE id_categorie = ".$donnees_categ['id']." ORDER BY id");
        while($donnees_forum = $retour_forum->fetch(PDO::FETCH_ASSOC)) // On lit les entrées une à une grâce à une boucle
        {
            echo "<div class='forum'><h4><a href='?page=forum&id_forum=".$donnees_forum['id']."'>".$donnees_forum['titre']."</a> :</h4>".$donnees_forum['description']."</div>";
        }
        $retour_forum->closeCursor();
        echo "</div>";
   }
$retour_categ->closeCursor();
            
?>