<div>
    <form action="" method="post">
        <h3>Email</h3>
            <input type="email" name="email" id="" placeholder="">
        <h3>Mot de passe</h3>
            <input type="password" name="motdepasse" id="" placeholder="">
            <button type="submit">Connexion</button>
    </form>
    <a href="<?= $router->generate('inscription') ?>">S'inscrire</a>
</div>