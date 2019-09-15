
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
         include("config.php");
         include("nav.html");
         addTopic(dataBaseLogIn(),$_POST,$_SESSION);
         echo "<div class='navfill'>".loggedIn()."</div>";
           
         ?>   
      <form action='forum.php' method='post'>
         <div class="container">
            <h1>Doorzoek het Forum</h1>
            <input type="text" name="ForumSearch" placeholder="Laat leeg voor alle posts">
            <label for="searchOption"><strong>Zoek Optie</strong></label><br />
            <input type="radio" name="searchOption" id="searchOption" value="N" checked="checked"> Naam<br>
            <input type="radio" name="searchOption" id="searchOption1" value="M"> Bericht<br>
            <input type="radio" name="searchOption" id="searchOption2" value="D"> Datum van plaatsing<br>
            <input type="date" style="border:solid 2px #3581B8; margin-top: 10px; margin-bottom: 10px;" name="date"><br/>
            <label for="orderOption"><strong>Order Optie</strong></label><br />
            <input type="radio" name="orderOption" id="orderOption" value="N"> Naam<br>
            <input type="radio" name="orderOption" id="orderOption1" value="M"> Bericht<br>
            <input type="radio" name="orderOption" id="orderOption1" value="D"> Datum<br>
            <?php searchError($_POST);?>
            <input type="submit" class="loginButton" style="margin-top:0px;" name="submit" value="Zoek">
            <input type="submit" class="loginButton" value="Terug">
         </div>
      </form>
      <?php $tooShort = mainForum($_POST,$_SESSION); ?>
      <form action='forum.php' method='post'>
         <div class="bijdrage container">
            <h1>Bijdrage</h1>
            <textarea placeholder="De bijdrage" name="msg"></textarea>
            <p>Verstuur bericht in topic:</p> <br/>
            <select name="topicChoice">
            <?php chooseTopic(dataBaseLogIn());?>
            </select><br/>
            <?php msgError($_SESSION,$tooShort);?><br/>
            <input style="height:50px; width:100px;" type="submit" class="loginButton" name="submit" value="Verstuur">        
         </div>
      </form>
      <form action='forum.php' method='post'>
         <div class="container">
            <h1>Nieuw Topic</h1>
            <input type="text" name="SetTopic">
            <?php topicError($_SESSION);  ?>
            <input style="height:50px; width:150px;" type="submit" class="loginButton" name="submit" value="Maak topic aan">
         </div>
      </form>
      <?php include("footer.html"); ?>
   </body>
</html>