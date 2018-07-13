<div class="categorie">
    <div class="navbarCategorie"><h3>Profil</h3></div>
    <center>
        <div class="profil">
                <form method="post" action="?page=profil&profil=editProfil">
                    <div id="profilPseudo" style="display: block;"><p>Pseudo : <?php echo $_SESSION['pseudo']; ?>  <button type="button" onclick="edit(this,'profilChangePseudo','profilPseudo')">Modifier</button></p></div>
                    <div id="profilChangePseudo" style="display: none;"><p><input required="required" type="text" name="pseudo" value="<?php echo $_SESSION['pseudo']; ?>"/></p></div>
                    <div id="profilUsername"><p>Identifiant de connexion : <?php echo $_SESSION['username']; ?> <button type="button" onclick="edit(this,'profilChangeUsername','profilUsername')">Modifier</button></p></div>
                    <div id="profilChangeUsername" style="display: none;"><p><input required="required" type="text" name="username" value="<?php echo $_SESSION['username']; ?>"/></p></div>
                    <div id="profilEmail"><p>Email : <?php echo $_SESSION['email']; ?> <button type="button" onclick="edit(this,'profilChangeEmail','profilEmail')">Modifier</button></p></div>
                    <div id="profilChangeEmail" style="display: none;"><p><input type="email" required="required" name="email" value="<?php echo $_SESSION['email']; ?>"/></p></div>
                    <div id="profilSignature"><p>Signature : <?php if(empty($_SESSION['signature'])) { echo "Vous n'avez pas encore de signature"; } else { echo $_SESSION['signature']; } ?> <button type="button" onclick="edit(this,'profilChangeSignature','profilSignature')">Modifier</button></p></div>
                    <div id="profilChangeSignature" style="display: none;"><p><textarea required="required" name="signature" rows="5" cols="40"><?php if(empty($_SESSION['signature'])) { echo "Vous n'avez pas encore de signature"; } else { echo $_SESSION['signature']; } ?></textarea></p></div>
                    <p>Confirmez votre mot de passe pour toute modification :</p>
                    <p><input type="password" name="password" value="azerty"/></p>
                    <p><input style="text-align:center;" type="submit" value="Confirmer la modification" name="valider"/></p>
                </form>
                <button><a href="index?page=profil&profil=password">Modifier mon mot de passe</a></button>
        </div>
    </center>
</div>