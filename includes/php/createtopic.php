<?php

if($_SESSION['login'])  {
    if(isset($_GET['id_forum']))    {
        if(isset($_POST['titre']))   {
            //on traite le formulaire
            $bdd->exec('INSERT INTO topic(pseudo_createur, id_createur, id_forum, titre, description, premier_message) VALUES("'.addslashes($_SESSION['pseudo']).'", "'.$_SESSION['id_user'].'", "'.$_POST['id_forum'].'", "'.addslashes($_POST['titre']).'", "'.addslashes($_POST['description']).'","'.addslashes($_POST['message']).'")');
            echo '<script>redirect("?page=forum&id_forum='.$_POST['id_forum'].'");</script>';
        }   else    {
            //on affiche le formulaire
            ?>
            <div class='categorie'>
                <div class='navbarCategorie'><h3>Création d'un topic</h3></div>
                <center>
                <form method="post" action='?page=createtopic&id_forum='<?php echo $_GET['id_forum']; ?>'>
                    <input required="required" type='text' style='text-align: center; width: 400px;' name='titre' value='titre'/><br><br>
                    <input type='text' required="required" style='text-align: center; width: 400px;' name='description' value='Petite déscription'/><br><br>
                    <textarea name="message" required="required" rows="8" cols="150" required="required">Mon premier super message</textarea><br>
                    <input type='hidden' name='id_forum' value='<?php echo $_GET['id_forum']; ?>'/>
                    <input type='submit' value='Envoyer'/>
                </form>
                </center>
            </div>
            <?php
        }
    }   else    {
        echo '<script>redirect("?page=404");</script>';
    }
}   else    {
    echo '<script>redirect("?page=404");</script>';
}


?>
