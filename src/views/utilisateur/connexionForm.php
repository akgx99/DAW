<form class="connexion-inputs" action="//<?= HOST . '/' . FOLDER_ROOT ?>/utilisateur/connexion" method="post">
    <input name="userName" placeholder="Pseudo" type="text" required />
    <input name="userPassword" placeholder="Mot de passe" type="password" required />
    <input class="button button-validate"type="submit" value="Se connecter">
</form>