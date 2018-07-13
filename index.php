<?php

session_start();
include('includes/php/fonctions.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include('includes/php/config.php');
include('includes/php/openDB.php');

?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="forum Simplon" /> <!-- déscription site web -->
        <meta name="keywords" content="forum, simplon, musique, dub, tribecore, acidcore, forum musique, développement web, php, html, css" /> <!--mots clef déscriptifs-->
        <meta name="author" content="Back : stéphane lavigne, front : Felix mengin, chef de projet : greg lyntz" /> <!-- Auteurs du projet -->
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="includes/css/inscription-style.css" />
        <link rel="stylesheet" type="text/css" href="includes/css/inscription-animate-custom.css" />
        <link rel="stylesheet" type="text/css" href="includes/css/style.css"/>
        <link rel="stylesheet" href="includes/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Wendy+One" rel="stylesheet">
        <script src="includes/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="includes/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <title>ZikaTonTon</title>
    </head>
    <header>
        <a href="index.php"><img class=logo src="includes/images/logo.png"/></a>
    </header>
    <body>
        <div class="body">
        <?php
        include('includes/php/navbar.php');
        if(isset($_GET['page'])) {
            switch ($_GET['page']):
                default:
                    include('includes/php/index.php');
                    break;
                case 'inscription':
                    include('includes/php/inscription.php');
                    break;
                case 'mp':
                    include('includes/php/mp.php');
                    break;
                case 'login' :
                    include('includes/php/login.php');
                    break;
                case 'admin' :
                    include('includes/php/admin.php');
                    break;
                case 'topic' : 
                    include('includes/php/topic.php');
                    break;
                case 'profil':
                    include('includes/php/profil.php');
                    break;
                case 'disconnect':
                    include('includes/php/disconnect.php');
                    break;
                case 'connect':
                    include('includes/php/connect.php');
                    break;
                case '404':
                    include('includes/html/404.html');
                    break;
                case 'forum':
                    include('includes/php/forum.php');
                    break;
                case 'createtopic':
                    include('includes/php/createtopic.php');
                    break;
            endswitch;
        }   else    {
            include('includes/php/index.php');
        }
        ?>
        
    </body>
</div>
</html>
<?php

include('includes/php/closeDB.php');

?>