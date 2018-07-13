<div class="container">

    <section>				
        <div id="container_demo" >
            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" class="animate form">
                    <form  action="?page=connect" autocomplete="on" method="post"> 
                        <h1>Log in</h1> 
                        <p> 
                            <?php
                            
                            if(isset($_GET['erreurLogs'])) {
                                ?>
                                <label for="username" class="uname" > <font color="red">Ton identifiant et ton mot de passe ne correspondent pas</font> </label>
                                <br><br>
                                <?php
                            }
                            
                            ?>
                            <label for="username" class="uname" > Ton identifiant de connexion ou ton email </label>
                            <input id="username" name="username" required="required" type="text" placeholder="monidentifiant ou monemail@email.com"/>
                        </p>
                        <p> 
                            <label for="password" class="youpasswd" > Ton mot de passe </label>
                            <input id="password" name="password" required="required" type="password" placeholder="X8df!90EO" /> 
                        </p>
                        <p class="login button"> 
                            <input type="submit" value="Login" /> 
                                                        </p>
                        <p class="change_link">
                                                                Pas encore membre ?
                                                                <a href="#toregister" class="to_register">Rejoins nous</a>
                                                        </p>
                    </form>
                </div>

                <div id="register" class="animate form">
                    <form  action="?page=inscription" autocomplete="on" method="post"> 
                        <h1> Sign up </h1> 
                        <p> 
                            <label for="usernamesignup" class="uname" >Ton identifiant de connexion</label>
                            <?php if(isset($_GET['usernameExist'])) { ?><label for="usernamesignup" ><font color="red"> Déjà utilisé</font></label> <?php } ?> <!-- Affichage erreur username -->
                            <input id="usernamesignup" name="username" required="required" type="text" placeholder="monlogin2608" />
                        </p>
                        <p> 
                            <label for="usernamesignup" class="uname" >Ton pseudo affiché sur le forum</label>
                            <?php if(isset($_GET['pseudoExist'])) { ?><label for="usernamesignup" ><font color="red"> Déjà utilisé</font></label> <?php } ?> <!-- Affichage erreur pseudo -->
                            <input id="usernamesignup" name="pseudo" required="required" type="text" placeholder="monlogin2608" />
                        </p>
                        <p> 
                            <label for="emailsignup" class="youmail" > Ton email</label>
                            <?php if(isset($_GET['emailExist'])) { ?><label for="emailsignup" class="youmail"><font color="red"> Déjà utilisée</font></label> <?php } ?> <!-- Affichage erreur email -->
                            <input id="emailsignup" name="email" required="required" type="email" placeholder="monemail@mail.com"/> 
                        </p>
                        <p> 
                            <label for="passwordsignup" class="youpasswd" >Ton mot de passe </label>
                            <?php if(isset($_GET['erreurPass'])) { ?><label for="passwordsignup" class="youpasswd"><font color="red">Tes mots de passes ne correspondent pas. </font></label><?php } ?> <!-- Affichage erreur password -->
                            <input id="passwordsignup" name="password" required="required" type="password" placeholder="X8df!90EO"/>
                        </p>
                        <p> 
                            <label for="passwordsignup_confirm" class="youpasswd" >Merci de confirmer ton mot de passe</label>
                            <input id="passwordsignup_confirm" name="password_confirmation" required="required" type="password" placeholder="X8df!90EO"/>
                        </p>
                        <p class="signin button"> 
                                                                <input type="submit" value="Inscription " name="inscription"/> 
                                                        </p>
                        <p class="change_link">  
                                                                Déjà membre ?
                                                                <a href="#tologin" class="to_register"> Connecte toi </a>
                                                        </p>
                    </form>
                </div>

            </div>
        </div>  
    </section>
</div>