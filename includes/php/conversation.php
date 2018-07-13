<?php
if(isset($_SESSION['login'])) {
    $req = "select count(*) as nb from conversation where id_receveur = '".$_SESSION['id_user']."' OR id_envoyeur = '".$_SESSION['id_user']."'";
    $reponse = $bdd->exec($req);
    if($reponse > 0) {
        echo $reponse." conversations";
    }   else    {
        echo "pas de conversation";
    }
}   else    {
    echo "<script>redirect('index.php?page=404');</script>";
}
?>