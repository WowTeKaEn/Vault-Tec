<?php
function dataBaseLogIn(){
    $hostname   = "localhost";
    $dbname     = "Website";
    $usernameDB = "sa";
    $pw         = "toor";
    return $dbh = new PDO("sqlsrv:Server=$hostname;Database=$dbname;
            ConnectionPooling=0", "$usernameDB", "$pw");
        }
?>