<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Vault-Tec</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <?php
include_once("DB.php");
include("nav.html");
include("config.php");
loggedIn();
?>
    <div class="landing">
        <h1>Vault-Tec</h1>
        <p>Prepare for the future!</p>
    </div>
    <img class="vaultboy" src="images/vault_boy.png" alt="Vault-boy">
    <div class="showcase">
        <h2>Benieuwd geworden?</h2>
        <h3>Hieronder wat algemene informatie</h3>
        <div class="txt">
            <div class="box">
                <h1>Over ons</h1>
                <p>
                    Het nationale hoofdkantoor van Vault-Tec bevindt zich in de buurt van onze demonstratiekelder
                    in Los Angeles. We hebben twee regionale hoofdkantoren: een voor de Columbia Commonwealth in
                    Washington, DC, en een tweede voor New England Commonwealth in Boston. We hebben ook onlangs
                    bedrijf ook
                    een attractie in het pretpark Nuka-World, waar het concept van een openlucht vault werd getest.<br />
                    <img src="images/Vault-Tec_C.E.O..png" height="240" width="240" alt="Vault-Tec CEO" />
                </p><a href="over-ons.php"> Bezoek de over ons pagina</a>
            </div>
            <?php
            $statement = "select * from videos where video_id = (:id)";
            $parameters = array(':id' => rand(0,24));
            videoShow(dataBaseLogIn(),$statement,$parameters); ?>
            <div class="box">
                <?php
                $statement = "select * from posts where post_id = (:id)";
                $parameters = array(':id' => rand(1,25));
                drawPosts(dataBaseLogIn(), $statement, $parameters);
                $statement = "select * from posts where post_id = (:id)";
                $parameters = array(':id' => rand(1,25));
                drawPosts(dataBaseLogIn(), $statement, $parameters);
                ?>
                </p><a href="forum.php"> Stel meer vragen op het forum</a>
            </div>
        </div>
    </div>
    <div class="Login">
        <a class="button" href="forum.php">Forum</a>
        <a class="button" href="login.php">Inloggen</a>
    </div>
    <div class="info">
        <p></p>
    </div>
    <?php include("footer.html"); ?>
</body>
</html>