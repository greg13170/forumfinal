<?php

if(isset($_SESSION['login']))   {
    if(isset($_POST['valid']))  {
        if(!empty($_POST['message']))    {
            if(!empty($_POST['titre']))  {
                //On traite le message
                $message = addslashes($_POST['message']);
                $titre = addslashes($_POST['titre']);
                $id_envoyeur = $_SESSION['id_user'];
                if(isset($_GET['id_receveur']))    {
                    $id_receveur = $_GET['id_receveur'];
                }   else    {
                    if(!empty($_POST['username']))   {
                        $req = $bdd->query("SELECT * FROM user WHERE username = '".addslashes($_POST['username'])."' OR pseudo = '".addslashes($_POST['username'])."'"); //requète contenant les infos utilisateur
                        $result = $req->fetch();
                        $id_receveur = $result['ID'];
                        $req->closeCursor();
                    }   else    {
                        echo "<script>redirect('?page=mp&mp=envoyer&erreur=pseudo');</script>";
                    }
                }
                $bdd->exec('INSERT INTO mp(id_envoyeur, id_receveur, pseudo_envoyeur, titre, text, lu) VALUES("'.addslashes($id_envoyeur).'", "'.addslashes($id_receveur).'", "'. addslashes($_SESSION['pseudo']).'", "'.addslashes($titre).'", "'.addslashes($message).'", "false")');
                echo "<div class='msgNotifGreen'>Votre message a bien été envoyé, vous allez être redirigé dans 3 secondes.</div>";
                echo '<script>redirect("?page=mp&mp=sent", 3000);</script>';
            }   else    {
                echo "<script>redirect('?page=mp&mp=envoyer&erreur=message');</script>";
            }
        }   else    {
            echo "<script>redirect('?page=mp&mp=envoyer&erreur=message');</script>";
        }
    }   else    {
        ?>

        <center>
            <form action="?page=mp&mp=envoyer" method="post">
                Pseudo ou nom d'utilisateur : <br>
                <input type='text' name='username'/><br>
                Titre : <br>
                <input type='text' name='titre'/><br>
                Message : <br>
                <textarea name="message" rows="5" cols="40" required="required">Mon super message</textarea><br>
                <input type='submit' name='valid' value='Envoyer'/>
            </form>
        </center>

        <?php
    }
}   else    {
    echo "<script>redirect('?page=404');</script>";
}

?>