<?php
if (isset($_GET['id_topic'])) {
    $retour_test = $bdd->query("SELECT * FROM topic WHERE id = " . $_GET['id_topic'] . "");
    $retour_topic = $bdd->query("SELECT * FROM topic WHERE id = " . $_GET['id_topic'] . "");
    if ($resulttest = $retour_test->fetch()) {
        $retour_test->closeCursor();
        $result = $retour_topic->fetch();
        if (isset($_GET['nombreMessages'])) {
            $nombreMessages = $_GET['nombreMessages'];
        } else {
            $nombreMessages = 5;
        }
        //Compte des topics sur ce forum
        $req = $bdd->query("SELECT * FROM msg_topic WHERE id_topic = '" . $_GET['id_topic'] . "'");
        $donnees_total = $req->rowCount();

        $nombreDePages = ceil($donnees_total / $nombreMessages);

        if ($donnees_total > 0) {
            if (isset($_GET['pageNum'])) { // Si la variable $_GET['pageNum'] existe...
                $pageActuelle = intval($_GET['pageNum']);

                if ($pageActuelle > $nombreDePages) { // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                    $pageActuelle = $nombreDePages;
                }
            } else { // Sinon
                $pageActuelle = 1; // La page actuelle est la n°1    
            }
            $req->closeCursor();

            $premiereEntree = ($pageActuelle - 1) * $nombreMessages;

            echo "<div class='categorie'>"
            . "<div class='navbarCategorie'><h3>" . $result['titre'] . "</h3></div>";
            if ($pageActuelle == 1) {
                echo "<div class='forum'><center><b>Créateur : " . $result['pseudo_createur'] . "</b></center><br><p>" . stripslashes(nl2br($result['premier_message'])) . "</p></div>";
            }
            $retour_messages = $bdd->query("SELECT * FROM msg_topic WHERE id_topic = " . $_GET['id_topic'] . " ORDER BY id LIMIT " . $premiereEntree . ", " . $nombreMessages);
            while ($donnees_messages = $retour_messages->fetch(PDO::FETCH_ASSOC)) { // On lit les entrées une à une grâce à une boucle
                echo "<div class='forum'><center><b>Créateur : " . $donnees_messages['pseudo_createur'] . "</b> | <u>" . stripslashes($donnees_messages['titre']) . "</u></center><br><p>" . stripslashes(nl2br($donnees_messages['message'])) . "</p></div>";
            }
            echo '<center>Page : '; //Pour l'affichage, on centre la liste des pages
            for ($i = 1; $i <= $nombreDePages; $i++) { //On fait notre boucle
                if ($i == $pageActuelle) { //Si il s'agit de la page actuelle...
                    echo ' [ ' . $i . ' ] ';
                } else { //Sinon...
                    echo '<a href="?page=topic&id_topic='.$_GET['id_topic'].'&pageNum=' . $i . '">' . $i . '</a> ';
                }
            }
            echo '</center></div>';
            if (isset($_SESSION['login'])) {
                ?>
                <center>
                <div id="boutonrep" style="display: block; margin-top: 20px;"><button type="button" onclick="edit(this,'formtopic','boutonrep')">Répondre</button></p></div>
                <div id="formtopic" style="display: none; margin-top: 20px;">
                    Réponse : <br>
                    <form method="post" action="?page=topic&id_topic=<?php echo $_GET['id_topic']; if(isset($_GET['pageNum']))  {   echo "&pageNum=".$_GET['pageNum']; }  ?>">
                        <input type="text" name="titre" value="Titre" required="required" style="text-align: center; width: 400px;"/><br><br>
                        <textarea name="message" required="required" rows="8" cols="150" required="required">Mon super message</textarea><br>
                        <input type='submit' name='valid' value='Envoyer'/>
                    </form>
                </div>
                </center>
                <?php
            }
            $retour_topic->closeCursor();
            $retour_messages->closeCursor();
        } else {
            echo "<div class='categorie'>"
            . "<div class='navbarCategorie'><h3>" . stripslashes($result['titre']) . "</h3></div>";
            echo "<div class='forum'><b>Créateur : " . $result['pseudo_createur'] . "</b><br><p>" . stripslashes(nl2br($result['premier_message'])) . "</p></div></div>";
            if (isset($_SESSION['login'])) {
                ?>
                <center>
                <div id="boutonrep" style="display: block; margin-top: 20px;"><button type="button" onclick="edit(this,'formtopic','boutonrep')">Répondre</button></p></div>
                <div id="formtopic" style="display: none; margin-top: 20px;">
                    Réponse : <br>
                    <form method="post" action="?page=topic&id_topic=<?php echo $_GET['id_topic']; if(isset($_GET['pageNum']))  {   echo "&pageNum=".$_GET['pageNum']; }  ?>">
                        <input type="text" name="titre" value="Titre" required="required" style="text-align: center; width: 400px;"/><br><br>
                        <textarea name="message" required="required" rows="8" cols="150" required="required">Mon super message</textarea><br>
                        <input type='submit' name='valid' value='Envoyer'/>
                    </form>
                </div>
                </center>
                <?php
            }
        }
    if(isset($_POST['message']))    {
        if(isset($_SESSION['login']))   {
            //traitement réponse si on est connecté.
            $bdd->exec('INSERT INTO msg_topic(pseudo_createur, id_createur, id_topic, titre, message) VALUES("'.addslashes($_SESSION['pseudo']).'", "'.$_SESSION['id_user'].'", "'.$_GET['id_topic'].'", "'.addslashes($_POST['titre']).'", "'.addslashes($_POST['message']).'")');
            echo('<script>redirect("?page=topic&id_topic='.$_GET['id_topic'].'&pageNum='.$nombreDePages.'");</script>');
        }
    }
    } else {
        echo "<script>redirect('?page=404');</script>";
    }
} else {
    echo "<script>redirect('?page=404');</script>";
}
?>
