<nav class="navbar navbar-expand-lg " style="margin-bottom: 50px">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img src="includes/images/tiret.png"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!--    <ul class="navbar-nav mr-auto">


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>



        </ul>
        -->
        <ul class="navbar-nav ml-auto">


            <li class="nav-item dropdown">
                <?php 
                    if(isset($_SESSION['login']))   {
                        
                        $req2 = $bdd->query("SELECT * FROM mp WHERE id_receveur = ".$_SESSION['id_user']." AND lu = 'false'");
                        $NbMsgNonLu = $req2->rowCount();
                        $req2->closeCursor();
                        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 50px">';
                        echo $_SESSION['pseudo'];
                        echo '</a>';
                        ?>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?page=profil">Profil</a>
                                <a class="dropdown-item" href="?page=mp">Messages privés<?php if($NbMsgNonLu > 0) { echo "(".$NbMsgNonLu.")"; } ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?page=disconnect">Déconnexion</a>
                            </div>
                        <?php
                    } else {
                        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 100px">';
                        echo "Connexion/inscription";
                        echo '</a>';
                        ?>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="padding-right: 10px; padding-left: 10px;">
                                <center>
                                    <form method="post" action="?page=connect">
                                        <input type="text" name="username" value="Username"/><br>
                                        <input type="password" name="password" value="azerty"/><br>
                                        <center><input type="submit" value="Valider"/></center>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?page=inscription#toregister">Inscription</a>
                                </center>
                            </div>
                        <?php
                    }
                ?>
            </li>
        </ul>        

    </div>
</nav>
