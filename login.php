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
         echo "<div class='navfill'>".loggedIn()."</div>";
         if (isset($_POST["submit"])) {
         $returnError = mainLogin($_POST);
         }
         ?>
      <form class="container" action="login.php" method="post">
         <h1>Inloggen</h1>
         <label for="username"><strong>Gebruikersnaam</strong></label>
         <input type="text" placeholder="Gebruikersnaam" id="username" name="username" required>
         <label for="password"><strong>Wachtwoord</strong></label>
         <input type="password" placeholder="Wachtwoord" id="password" name="password" required>
         <?php if(isset($returnError["falsePass"])){loginError($returnError["falsePass"]);}?>
         <input type="submit" class="loginButton" name="submit" value="Inloggen">
         <br/>
         <input type="checkbox" checked="checked" id="remember"> <label for="remember">Onthouden</label>
         </div>
         <span class="password">Wachtwoord <a href="#">vergeten?</a></span>
      </form>
      <form class="container" action="login.php" method="post">
         <div class="container">
            <h1>Aanmelden</h1>
            <p>Vul deze velden in om een account aan te maken</p>
            <hr>
            <label for="username"><strong>Gebruikersnaam</strong></label>
            <input type="text" placeholder="Enter Gebruikersnaam" id="username" name="username" required>
            <label for="password"><strong>wachtwoord</strong></label>
            <input type="password" placeholder="Wachtwoord" id="password-register" name="password-register" required>
            <label for="password"><strong>herhaal wachtwoord</strong></label>
            <input type="password" placeholder="Herhaal wachtwoord" id="password-repeat" name="password-repeat" required>
            <label for="dob"><strong>Geboorte datum:</strong></label>
            <input type="date" id="dob" style="border: solid 1px rgba(128, 128, 128, 0.308);" name="dob">
            <br/>
            <div class="gender">
               <label for="gender"><strong>Geslacht</strong></label><br />
               <input type="radio" name="gender" id="gender" value="m"> Man<br>
               <input type="radio" name="gender" id="gender1" value="f"> Vrouw<br>
               <input type="radio" name="gender" id="gender2" value="o"> Iets anders
            </div>
            <?php if(isset($returnError['returnError'])){returnError($returnError['returnError']);}?>
            <hr>
            <br/>
            <input type="submit" class="loginButton" name="submit" value="Aanmelden">
         </div>
      </form>
      <?php include("footer.html"); ?>
   </body>
</html>