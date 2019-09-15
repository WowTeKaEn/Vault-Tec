<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Vault-Tec</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
<?php
        include("nav.html");
        include("config.php"); 
        include_once("DB.php");
        echo "<div class='navfill'>".loggedIn()."</div>";    
?>
    <div class="border about">
        <img src="images/Vault-Tec_C.E.O..png" alt="foto van ons">
        <h1>Over ons</h1>
        <div class="border">
            <img src="images/Vault-Tec_C.E.O._Bas.png" width="150" alt="Baas Bas" />
            <p class="fixTekst"><strong class="kopje">Baas Bas</strong><br /> Ik ben iemand met een creatieve geest die
                er van houd om te ondernemen, te ontwerpen en met technologie aan de gang te zijn. Daarom koos ik er
                voor om een innovatieve en creative economische opleiding te gaan doen. Maar helaas was dit toch niet
                helemaal een match. Daarom ben ik overgeschakeld naar ICT. Daar heb ik het goed naar men zin op het
                moment. Wel mis ik de projecten van de andere school. Hier werkten we met echte opdrachtgevers die, als
                ons project goed was het misschien ook nog gingen gebruiken. Nu werken we alleen maar met fictieve
                opdrachtgevers.</p>
        </div>
        <br />
        <div class="border">
            <img src="images/Vault-Tec_C.E.O._Wout.png" width="150" alt="Wout de Houthakker" />
            <p class="fixTekst"><strong class="kopje">Wout houd van hout</strong><br /> Ik ben Wout en ik hou van hout.
                Ik zit op de scouting dus ik weet wel hoe ik knopen moet leggen. Ik ben een officele nerd en eerste
                member/bouwer van de vault tec site. Ik heb een huisdier genaamd visje, het is een vis. Ik ben super
                slim met computers dus daarom studeer ik ICT. Plus ik hou echt niet van paarden tekenen. Teksten
                schrijven vind ik ook heel erg leuk. Maar ik ben het zo in het Engels gewend dat het in het Nederlands
                een beetje moeilijk is. Ik hou het meest van skiien. Dit doe ik all day all night. Al is het niet in
                het echt dan maar op de PC</p>
        </div>
    </div>
    <?php include("footer.html"); ?>
</body>
</html>