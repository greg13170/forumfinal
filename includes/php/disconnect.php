<?php
if(isset($_SESSION['login']))   {
    session_destroy();
    echo "<div class='msgNotifGreen'>Déconnection, redirection vers la page de login dans 3s</div>";
    echo "<script>redirect('index.php?page=inscription', 3000);</script>";
}   else    {
    echo "<script>redirect('index.php');</script>";

}

?>