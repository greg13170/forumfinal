<?php

if (isset($_SESSION['login'])) {
    ?>
    <script>
        redirect("index.php");
    </script>
    <?php

} else {
    if (isset($_POST['username'])) { //verif existance des variables
        if (isset($_POST['password'])) { //verif existance des variables
            $password = md5($_POST['password']);
            if (filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
                $reqTest = $bdd->query("SELECT * FROM user WHERE email = '" . addslashes($_POST['username']) . "' AND password = '" . $password . "'"); //requête pour tester l'utilisateur
                $req = $bdd->query("SELECT * FROM user WHERE email = '" . addslashes($_POST['username']) . "' AND password = '" . $password . "'"); //requète contenant les infos utilisateur
                if ($resulttest = $reqTest->fetch()) {
                    $result = $req->fetch();
                    setSession($result['ID'], $result['pseudo'], $result['username'], $password, $result['email'], $result['signature'], $result['rang']); //Définition des session
                    confirmLogin($result['pseudo']);
                } else {
                    ?>
                    <script>
                        redirect("?page=inscription&erreurLogs=true"); //erreur de connection, les IDs ne correspondent pas
                    </script>
                    <?php

                }
            } else {
                $reqTest = $bdd->query("SELECT * FROM user WHERE username = '" . addslashes($_POST['username']) . "' AND password = '" . $password . "'"); //requête pour tester l'utilisateur
                $req = $bdd->query("SELECT * FROM user WHERE username = '" . addslashes($_POST['username']) . "' AND password = '" . $password . "'"); //requète contenant les infos utilisateur
                if ($resulttest = $reqTest->fetch()) {
                    $result = $req->fetch();
                    setSession($result['ID'], $result['pseudo'], $result['username'], $password, $result['email'], $result['signature'], $result['rang']); //Définition des session
                    confirmLogin($result['pseudo']);
                } else {
                    ?>
                    <script>
                        redirect("?page=inscription&erreurLogs=true"); //erreur de connection, les IDs ne correspondent pas
                    </script>
                    <?php

                }
            }
            $req->closeCursor();
            $reqTest->closeCursor();
        } else {
            ?>
            <script>
                redirect("?page=inscription"); //erreur de connection, les IDs ne correspondent pas
            </script>
            <?php

        }
    } else {
        ?>
        <script>
            redirect("?page=inscription"); //erreur de connection, les IDs ne correspondent pas
        </script>
        <?php

    }
}
?>