<?php
if(isset($_SESSION['login']))  {
    if(isset($_GET['id'])) {
        $req = $bdd->query("SELECT * FROM mp WHERE id = ".$_GET['id']);
        if($result = $req->fetch()) {
            $req->closeCursor();
            if($result['lu'] == "false")  {
                $bdd->exec("UPDATE mp SET lu = 'true' WHERE id = ".$_GET['id']);
            }
            ?>

            <center>
                Message de : <?php echo $result['pseudo_envoyeur']; ?><br>
                titre : <u><?php echo stripslashes($result['titre']); ?></u><br>
                <p>Message : <br><?php echo stripslashes(nl2br($result['text'])); ?><br><br>
                    <?php if(isset($_GET['etat']))  {
                        if($_GET['etat'] == "envoyeur") {
                            echo '<a href="?page=mp&mp=sent">Retour</a>';
                        }
                    }
                    ?>
                    <br>
                <?php
                if($_SESSION['id_user'] == $result['id_receveur'])  {
                    ?>
                    Répondre :
                    <form method="post" action="?page=mp&mp=envoyer&id_receveur=<?php echo $result['id_envoyeur']; ?>">
                        <input type="HIDDEN" name="titre" value="RE: <?php echo $result['titre']; ?>"/>
                        <label name="message">Votre message : </label><br>
                        <textarea name="message" rows="5" cols="40" required="required">Mon super message</textarea><br>
                        <input type="submit" value="envoyer" name="valid"/>
                    </form><br>
                <?php
                if(isset($_GET['etat']))    {
                    if($_GET['etat'] == "receveur") {
                        echo '<a href="?page=mp">Retour</a>';
                    } else {
                        echo '<a href="?page=mp&mp=sent">Retour</a>';
                    }
                }
                }
                ?>
            </center>
            <?php
        } else {
            echo "<script>redirect('?page=404');</script>";
        }
    }   else    {
        echo "<script>redirect('?page=404');</script>";
    }
}   else    {
    echo "<script>redirect('?page=404');</script>";
}
?>