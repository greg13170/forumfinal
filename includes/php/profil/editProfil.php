<?php
$signature = "Vous n'avez pas encore de signature";

if(isset($_SESSION['login'])){
    if(isset($_POST['valider']))    { //On vérifie que le formulaire a bien été envoyé
        if(isset($_POST['password']))   {
            if(md5($_POST['password']) == $_SESSION['password'])    {
                $input = false;
                $requete = "";
                if(isset($_POST['pseudo'])) { //Verification que pseudo existe, s'il existe on verif qu'il ne soit pas le même qu'actuellement sinon on écrit la requete avec le pseudo actuel (pareil pour tout)
                    $input = true;
                    if($_POST['pseudo'] != $_SESSION['pseudo']) {
                        $pseudo = addslashes($_POST['pseudo']);
                        $requete = $requete."pseudo='".$pseudo."', "; //Incrémentation de la requête sql d'édition de profil
                        $pseudo = $_POST['pseudo'];
                    }   else    {
                        $pseudo = addslashes($_SESSION['pseudo']);
                        $requete = $requete."pseudo='".$pseudo."', ";
                        $pseudo = $_SESSION['pseudo'];
                    }
                }   else    {
                    $pseudo = addslashes($_SESSION['pseudo']);
                    $requete = $requete."pseudo='".$pseudo."', ";
                    $pseudo = $_SESSION['pseudo'];
                }
                if(isset($_POST['username'])) {
                    $input = true;
                    if($_POST['username'] != $_SESSION['username']) {
                        $username = addslashes($_POST['username']);
                        $requete = $requete."username='".$username."', ";
                        $username = $_POST['username'];
                    }   else    {
                        $username = addslashes($_SESSION['username']);
                        $requete = $requete."username='".$username."', ";
                        $username = $_SESSION['username'];
                    }
                }   else    {
                    $username = addslashes($_SESSION['username']);
                    $requete = $requete."username='".$username."', ";
                    $username = $_SESSION['username'];
                }
                if(isset($_POST['email'])) {
                    $input = true;
                    if($_POST['email'] != $_SESSION['email']) {
                        $email = addslashes($_POST['email']);
                        $requete = $requete."email='".$email."', ";
                        $email = $_POST['email'];
                    }   else    {
                        $email = addslashes($_SESSION['email']);
                        $requete = $requete."email='".$email."', ";
                        $email = $_SESSION['email'];
                    }
                }   else    {
                    $email = addslashes($_SESSION['email']);
                    $requete = $requete."email='".$email."', ";
                    $email = $_SESSION['email'];
                }
                if(isset($_POST['signature'])) {
                    $input = true;
                    if($_POST['signature'] != $_SESSION['signature']) {
                        if($_POST['signature'] ==  $signature) {
                            $requete = $requete."signature=''";
                            $signature = "";
                        }   else    {
                            $signature = addslashes($_POST['signature']);
                            $requete = $requete."signature='".$signature."'";
                            $signature= $_POST['signature'];
                        }
                    }   else    {
                        $signature = addslashes(($_SESSION['signature']));
                        $requete = $requete."signature='".$signature."'";
                        $signature = $_SESSION['signature'];
                    }
                }   else    {
                    $signature = addslashes($_SESSION['signature']);
                    $requete = $requete."signature='".$signature."'";
                    $signature = $_SESSION['signature'];
                }
                if($input) {
                    $bdd->exec("UPDATE user SET ".$requete." WHERE id='".$_SESSION['id_user']."'");
                    setSession($_SESSION['id_user'], $pseudo, $username, $_SESSION['password'], $email, $signature, $_SESSION['rang']);
                    echo "<div class='msgNotifGreen'>Votre profil a bien été édité, vous allez être redirigé vers la page de profil dans 3 secondes.</div>";
                    echo "<script>redirect('?page=profil', 3000);</script>";
                }
            }   else    {
                echo "<div class='msgNotifRed'>Votre mot de passe est faux, vous allez être redirigé vers la page de profil dans 3 secondes.</div>";
                echo "<script>redirect('?page=profil', 3000);</script>";
            }
        }   else    {
            echo "<div class='msgNotifRed'>Veuillez entrez un mot de passe, vous allez être redirigé vers la page de profil dans 3 secondes.</div>";
            echo "<script>redirect('?page=profil', 3000);</script>";
        }
    }   else { 
        echo "<script>redirect('?page=profil');</script>";
    }
}   else    {
    echo "<script>redirect('index.php');</script>";
}

?>