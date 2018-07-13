<?php

if(isset($_GET['id_forum']))   {
    $retour_test = $bdd->query("SELECT * FROM forum WHERE id = ".$_GET['id_forum']."");
    $retour_forum = $bdd->query("SELECT * FROM forum WHERE id = ".$_GET['id_forum']."");
    if ($resulttest = $retour_test->fetch()) {
        $retour_test->closeCursor();
        $result = $retour_forum->fetch();
        $id_categ = $result['id_categorie'];
        if(isset($_GET['nombreMessages']))   {
            $nombreMessages = $_GET['nombreMessages'];
        }   else    {
            $nombreMessages = 10;
        }
        //Compte des topics sur ce forum
        $req = $bdd->query("SELECT * FROM topic WHERE id_forum = '".$_GET['id_forum']."'"); //Nous récupérons le contenu de la requête dans $retour_total
        $donnees_total = $req->rowCount();

        $nombreDePages=ceil($donnees_total/$nombreMessages);

        if($donnees_total > 0)  {
            if(isset($_GET['pageNum'])) // Si la variable $_GET['pageNum'] existe...
            {
                 $pageActuelle=intval($_GET['pageNum']);

                 if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                 {
                      $pageActuelle=$nombreDePages;
                 }
            }
            else // Sinon
            {
                 $pageActuelle=1; // La page actuelle est la n°1    
            }
            $req->closeCursor();

            $premiereEntree = ($pageActuelle-1)*$nombreMessages;    
            
            echo "<div class='categorie'>"
            . "<div class='navbarCategorie'><h3>".$result['titre']."</h3>";
            if(isset($_SESSION['login'])) {
                echo "<div class='createtopic'><a href='?page=createtopic&id_forum=".$_GET['id_forum']."'>Créer un topic</a></div></div>";
            }   else    {
                echo "</div>";
            }
            
            $retour_topic = $bdd->query("SELECT * FROM topic WHERE id_forum = ".$_GET['id_forum']." ORDER BY id DESC LIMIT ".$premiereEntree.", ".$nombreMessages);
            while($donnees_topic = $retour_topic->fetch(PDO::FETCH_ASSOC)) // On lit les entrées une à une grâce à une boucle
            {
                echo "<div class='forum'><h5><a href='?page=topic&id_topic=".$donnees_topic['id']."'>".$donnees_topic['titre']."</a> :</h5>".$donnees_topic['description']."<br><b>Créateur : ".$donnees_topic['pseudo_createur']."</b></div>";
            }
            echo '</div>';
            echo '<center>Page : '; //Pour l'affichage, on centre la liste des pages
            for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
            {
                 if($i==$pageActuelle) //Si il s'agit de la page actuelle...
                 {
                     echo ' [ '.$i.' ] '; 
                 }	
                 else //Sinon...
                 {
                      echo ' <a href="?page=forum&pageNum='.$i.'">'.$i.'</a></center> ';
                 }
            }
            $retour_topic->closeCursor();
            $retour_forum->closeCursor();
        }   else    {
            echo "<div class='categorie'>"
            . "<div class='navbarCategorie'><h3>".$result['titre']."</h3>";
            if(isset($_SESSION['login'])) {
                echo "<div class='createtopic'><a href='?page=createtopic&id_forum=".$_GET['id_forum']."'>Créer un topic</a></div></div><center>Aucun topic de crée.</center></div>";
            }   else    {
                echo "</div><center>Aucun topic de crée.</center></div>";
            }
        }
    }   else    {      
        echo "<script>redirect('?page=404');</script>";
    }
}   else    {
    echo "<script>redirect('?page=404');</script>";
}
    
?>