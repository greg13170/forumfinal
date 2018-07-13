<?php

//On commence par vérifier si les variable ne sont pas vide pour éviter que quelqu'un s'inscrive par un formulaire externe.
if(empty($_POST['username'])) {
    header("Location: ?page=inscription&erreur=1");
}   else    {
    if(empty($_POST['pseudo'])) {
        header("Location: ?page=inscription&erreur=1");
    } else {
        if(empty($_POST['email'])) {
            header("Location: ?page=inscription&erreur=1");
        }   else    {
            if(empty($_POST['password'])) {
                header("Location: ?page=inscription&erreur=1");
            } else {
                if(empty($_POST['password_confirmation'])) {
                    header("Location: ?page=inscription&erreur=1");
                }   else    {
                    if($_POST['password'] == $_POST['password_confirmation'])   {
                        //On commence à traiter les informations pour les vérifier.
                        $reqTest = $bdd->query("SELECT * FROM user WHERE username = '".addslashes($_POST['username'])."' OR pseudo = '".addslashes($_POST['pseudo'])."' OR email = '".addslashes($_POST['email'])."'"); // première requete de test pour ne pas perdre le Fetch
                        $req = $bdd->query("SELECT * FROM user WHERE username = '".addslashes($_POST['username'])."' OR pseudo = '".addslashes($_POST['pseudo'])."' OR email = '".addslashes($_POST['email'])."'"); //Seconde requete à traiter pour identifier les erreur et les renvoyer
                        if($resulttest = $reqTest->fetch()) { //On vérifie que la requete de test soit pleine pour savoir si un utilisateur éxiste déjà avec ses infos
                            $erreurLog = "";
                               while($result = $req->fetch()) { // Si la requete de test est pleine on procède a lisolation des erreurs
                                   echo $result['pseudo'].' '.$result['username'].' '.$result['password'].' '.$result['email'].'</br>';
                                   if($result['username'] == $_POST['username']){
                                       $erreurLog = $erreurLog."&usernameExist=true"; //Renvoi un erreur en GET
                                   }
                                   if($result['pseudo'] == $_POST['pseudo']) {
                                       $erreurLog = $erreurLog."&pseudoExist=true"; //Renvoi un erreur en GET
                                   }
                                   if($result['email'] == $_POST['email']) {
                                       $erreurLog = $erreurLog."&emailExist=true"; //Renvoi un erreur en GET
                                   }
                                }
                            Header('Location: ?page=inscription'.$erreurLog.'#toregister'); //Redirige vers la page d'inscription avec les variable d'erreurs en GET
                        }    else    {
                               $password = md5($_POST['password']);
                               $bdd->exec('INSERT INTO user(pseudo, username, password, email, rang) VALUES("'.addslashes($_POST['pseudo']).'", "'.addslashes($_POST['username']).'", "'.$password.'", "'.addslashes($_POST['email']).'", "0")');
                               ?>

                               <!-- Formulaire de connection validé automatiquement -->
                               <div class='msgNotifGreen'>Bonjour <?php echo $_POST['pseudo']; ?>, tu vas être identifié dans 3 secondes.</div>
                               <form name="connexion" method="post" action="?page=connect"> <input type="hidden" name="username" value="<?php echo $_POST['username']; ?>" /> <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>" /> </form>
                               <script type="text/javascript"> 
                                   setTimeout(function() {
                                        document.connexion.submit(); 
                                    }, 3000);
                               </script>
                               <!-- Fin de formulaire et script js -->
                               
                               <?php
                                }    
                        $req->closeCursor();
                        $reqTest->closeCursor();
                    }   else    {
                        $erreurLog = $erreurLog."&erreurPass=true";
                        header('Location: ?page=inscription'.$erreurLog.'#toregister');
                    }
                }
            }
        }
    }
}

?>