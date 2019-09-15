<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Vault-Tec</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <?php 
include("config.php");
include_once("DB.php");
include("nav.html");
echo "<div class='navfill'>".loggedIn()."</div>";
?>
    <div class="border">
        <div class="videoH1">
            <h1 style="font-size: 3em">The Vault-Tec S.P.E.C.I.A.L System!</h1>
            <h1>explained in real motion pictures!</h1>
        </div>
        <form class="borderframe" action='video.php' method='post'>
          <h1>Doorzoek de videos</h1>
      <input type="text" placeholder="Voor filter leeg laten" name="ForumSearch">
     
                <div>
                <label for="searchOption"><strong>Zoek Optie</strong></label><br>
               <input type="radio" name="searchOption" id="searchOption" value="N" checked="checked"> Naam<br>
               <input type="radio" name="searchOption" id="searchOption1" value="M"> Discriptie<br>

              
               <label for="filterOption"><strong>filter Optie</strong></label><br>
                
               <input type="radio" name="filterOption" id="filterOption" value="V"> Vault-Tec<br>
               <input type="radio" name="filterOption" id="filterOption1" value="D"> DLC<br>
               <input type="radio" name="filterOption" id="filterOption2" value="S"> S.P.E.C.I.A.L Uitleg<br>
               <input type="radio" name="filterOption" id="filterOption3" value="T"> Trailers<br>
               <input type="checkbox" name="order"> Sorteer op naam
               </div>
               <?php videoSearchError($_POST); ?>
               <input type="submit" class="loginButton" name="submit" value="Zoek">
        </form>
        <?php videoMain($_POST); ?>
    </div>   
    <?php include("footer.html"); ?>
</body>
</html>