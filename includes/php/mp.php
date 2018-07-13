<div class="categorie">
    <div class="navbarCategorie"><h3>Messages privés</h3></div>
    <?php

    if(isset($_SESSION['login']))   {
        if(isset($_GET['mp'])) {
            switch ($_GET['mp']):
                default:
                    include('mp/mp.php');
                    break;
                case 'envoyer':
                    include('mp/envoyer.php');
                    break;
                case 'lire':
                    include('mp/lire.php');
                    break;
                case 'sent';
                    include('mp/sent.php');
                    break;
                case 'lecture':
                    include('mp/lecture.php');
                    break;
            endswitch;
        }   else    {
            include('mp/mp.php');
        }
    }   else    {
        echo "<script>redirect('?page=404');</script>";
    }
    ?>
</div>