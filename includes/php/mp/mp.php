<center>
    <a href="?page=mp&mp=sent">Aller aux messages envoyés</a> | <a href="?page=mp&mp=envoyer">Envoyer un message</a><br><br>
<?php

if(isset($_SESSION['login'])) {
    //Définition du nombre de messages affichés
    if(isset($_GET['nombreMessages']))   {
        $nombreMessages = $_GET['nombreMessages'];
    }   else    {
        $nombreMessages = 5;
    }
    //Compte des message reçus
    $req = $bdd->query("SELECT * FROM mp WHERE id_receveur = '".$_SESSION['id_user']."'"); //Nous récupérons le contenu de la requête dans $retour_total
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

        $req2 = $bdd->query("SELECT * FROM mp WHERE id_receveur = ".$_SESSION['id_user']." AND lu = 'false'");
        $NbMsgNonLu = $req2->rowCount();
        $req2->closeCursor();

        echo "Vous avez ".$NbMsgNonLu." non lu<br><br><br>";

        //$retour_messages = $bdd->query("SELECT * FROM mp ORDER BY id DESC LIMIT ".$premiereEntree.", ".$nombreMessages." WHERE id_receveur = '".$_SESSION['id_user']."'");
        $retour_messages = $bdd->query("SELECT * FROM mp WHERE id_receveur = ".$_SESSION['id_user']." ORDER BY id DESC LIMIT ".$premiereEntree.", ".$nombreMessages);
        while($donnees_messages = $retour_messages->fetch(PDO::FETCH_ASSOC)) // On lit les entrées une à une grâce à une boucle
        {
             //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
             //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
             if($donnees_messages['lu'] == "false")  {
                echo "<strong>Message de ".$donnees_messages['pseudo_envoyeur']."<br>"
                . "<a href='?page=mp&mp=lecture&id=".$donnees_messages['id']."&etat=receveur'>Titre : ".stripslashes($donnees_messages['titre'])."</a></strong><br><br>";
             }  else    {
                echo "Message de ".$donnees_messages['pseudo_envoyeur']."<br>"
                . "<a href='?page=mp&mp=lecture&id=".$donnees_messages['id']."&etat=receveur'>Titre : ".stripslashes($donnees_messages['titre'])."</a><p><br>";
             }
            //J'ai rajouté des sauts à la ligne pour espacer les messages.   
        }

        echo 'Page : '; //Pour l'affichage, on centre la liste des pages
        for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
        {
             //On va faire notre condition
             if($i==$pageActuelle) //Si il s'agit de la page actuelle...
             {
                 echo ' [ '.$i.' ] '; 
             }	
             else //Sinon...
             {
                  echo ' <a href="?page=mp&pageNum='.$i.'">'.$i.'</a> ';
             }
        }
        $retour_messages->closeCursor();
    }   else    {
        echo "Vous n'avez pas de messages privés";
    }
}   else    {
    echo "<script>redirect('?page=404');</script>";
}

?>
</center>