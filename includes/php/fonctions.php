<?php

//Fonctions création/édition des session
function setSession($id_user, $pseudo, $username, $password, $email, $signature, $rang) {
    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $id_user;
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['signature'] = $signature;
    $_SESSION['rang'] = $rang;
    $_SESSION['password'] = $password;
}

//Confirmation de connection et redirection
function confirmLogin($pseudo) {
    ?>
    <script>
        redirect("?page=index.php", 3000); //erreur de connection, les IDs ne correspondent pas
    </script>
    <div class='msgNotifGreen'>Bonjour <?php echo $pseudo; ?>, tu vas être redirigé vers la page principal dans 3 secondes.</div>
    <?php
}
?>