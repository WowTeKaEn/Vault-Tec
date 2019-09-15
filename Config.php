<?php
include_once("DB.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();    
}
if (isset($_POST["submit"])) {
    if ($_POST["submit"] == 'Log Uit') {
        session_unset();
        session_destroy();
    }
}
function loggedIn() {
    if (isset($_SESSION["Username"])) {
        echo "<form class='log-content' action=" . basename($_SERVER['PHP_SELF']) . " method='post'>
        <p class='UserLetter'>" . $_SESSION["Username"][0] . "</p>
        <input class='logoff' type='submit' name='submit' value='Log Uit'>
        </form>";
    }
}
function register($dbh) {
    $NotallFilled = false;
    $passNotSim   = false;
    $NotallFilled = false;
    $AccGenerated = false;
    if ($_POST["submit"] == "Aanmelden") {
        if (isset($_POST["username"], $_POST["password-register"], $_POST["password-repeat"], $_POST["dob"], $_POST["gender"])) {
            $NotallFilled   = false;
            $usernameReg    = $_POST["username"];
            $passwordReg    = $_POST["password-register"];
            $passwordRegRep = $_POST["password-repeat"];
            $dobReg         = $_POST["dob"];
            $genderReg      = $_POST["gender"];
            if ($passwordReg === $passwordRegRep) {
                $queryRegCheck = $dbh->prepare("select username,password from users where username = (:username)");
                $queryRegCheck->execute(array(
                    ':username' => $usernameReg
                ));
                $check = $queryRegCheck->fetch();
                if ("$check[username]" == $usernameReg) {
                    $return = 4;
                } else {
                    $queryReg = $dbh->prepare("insert into users (Username, Password, dob, gender) values ((:username),(:password), (:dob), (:gender))");
                    $queryReg->execute(array(
                        ':username' => $usernameReg,
                        ':password' => password_hash($passwordReg, PASSWORD_DEFAULT),
                        ':dob' => $dobReg,
                        ':gender' => $genderReg
                    ));
                    if ($queryReg == true) {
                        $return = 1;
                    }
                }
            } else {
                $return = 2;
            }
        } else {
            $return = 3;
        }
        return $return;
    }
}
function logIn($dbh) {
    $falsePass = false;
    if ($_POST["submit"] == "Inloggen") {
        $usernameLog = $_POST["username"];
        $passwordLog = $_POST["password"];
        $query       = $dbh->prepare("select username,password from users where username = (:username)");
        $query->execute(array(
            ':username' => $usernameLog
        ));
        $user = $query->fetch();
        if ("$user[username]" == $usernameLog && password_verify($passwordLog, "$user[password]")) {
            $_SESSION["Username"] = "$usernameLog";
            header('Location: forum.php');
        } else {
            $falsePass = true;
        }
    }
    return $falsePass;
}
function returnError($returnError) {
    switch ($returnError) {
        case 1:
            echo "<p style = 'color: green; margin-top: 20px;'>Account aangemaakt. U kunt hier boven inloggen.</p>";
            break;
        case 2:
            echo "<p style = 'color: red; margin-top: 20px;'>Wachtwoorden komen niet overeen</p>";
            break;
        case 3:
            echo "<p style = 'color: red; margin-top: 20px;'>Vul alle velden in</p>";
            break;
        case 4:
            echo "<p style = 'color: red; margin-top: 20px;'>Gebruikersnaam is al in gebruik</p>";
            break;
    }
}
function sendMsg($dbh, $tooShort) {
    if (!($tooShort)) {
        $topics = $dbh->query("select max(topic_id) as count from topic");
        if (isset($_POST["msg"]) && isset($_SESSION["Username"]) && $_POST["submit"] == 'Verstuur') {
            $msg           = $_POST["msg"];
            $topicChoiceID = $_POST['topicChoice'];
            $post          = $dbh->query("select max(post_id) as id from posts");
            $postId        = $post->fetch();
            $postId        = (int) $postId['id'] + 1;
            $queryPost     = $dbh->prepare("insert into posts (post_id, topic_id, Username,post_date,post_content) values ((:postId),(:topicId),(:Username),(:date),(:msg))");
            $queryPost->execute(array(
                ':postId' => $postId,
                ':topicId' => $topicChoiceID,
                ':date' => date('Y/m/d'),
                ':msg' => $msg,
                ':Username' => $_SESSION['Username']
            ));
        }
    }
}
function addTopic($dbh,$SubForumArray,$forumSession) {
    
    if (isset($SubForumArray["SetTopic"]) && $SubForumArray["submit"] == 'Maak topic aan') {
        
        $topics    = $dbh->query("select max(topic_id) as count from topic");
        $topicsMax = $topics->fetch();
        $data      = $dbh->prepare("insert into topic (topic_id,topic_name) values ((:topic),(:topicName))");
        $data->execute(array(
            ':topic' => (int) $topicsMax['count'] + 1,
            ':topicName' => $SubForumArray['SetTopic']
        ));
        header("Refresh:0");
    }
    
}
function drawTopics($dbh) {
    $topics    = $dbh->query("select max(topic_id) as count from topic");
    $topicsMax = $topics->fetch();
    for ($i = 0; $i < (int) $topicsMax["count"] + 1; $i++) {
        $topicName = $dbh->prepare("select topic_name from topic where topic_id =(:id)");
        $topicName->execute(array(
            ':id' => $i
        ));
        $topicName = $topicName->fetch();
        echo "<div class='topics'><label><strong>" . $topicName['topic_name'] . "</strong></label><input class='topicbtn' type='checkbox' id='topicbtn' name='topicbtn'/><div class='topic'>";
        drawPosts($dbh, "select * from posts where topic_id = (:counter)", array(
            ':counter' => $i
        ));
        echo "</div></div></div>";
    }
}
function drawPosts($dbh, $statement, $parameters) {
    $data = $dbh->prepare($statement);
    $data->execute($parameters);
    while ($post = $data->fetch()) {
        echo "<div class='border forumpost'>
        <p class='UserLetter' style='position: relative;'>" . $post["Username"][0] . "</p>
        <p class='timestamp'>" . $post['post_date'] . "</p> 
        <p class='name'><strong>" . $post['Username'] . "</strong></p>
        <p>" . $post['post_content'] . "</p>
        </div>  
        <br/>";
    }
}
function chooseTopic($dbh) {
    $data = $dbh->query("select topic_name,topic_id from topic");
    while ($topicChoice = $data->fetch()) {
        echo "<option value=" . $topicChoice['topic_id'] . ">" . $topicChoice['topic_name'] . "</option>";
    }
}
function videoShow($dbh, $statement, $parameters) {
    $data = $dbh->prepare($statement);
    $data->execute($parameters);
    while ($video = $data->fetch()) {
        echo "<div class='box'>
        <h1>" . $video['video_name'] . "</h1>
        <iframe allowfullscreen='allowfullscreen' width='420' height='315' src='" . $video['video_url'] . "'>
        </iframe>";
        if (isset($video['video_discription'])) {
            echo "<p style='width:420px;'>" . $video['video_discription'] . "</p>";
        }
        echo "</div>";
    }
}
function allVideos() {
    $statement  = "select * from videos";
    $parameters = array();
    videoShow(dataBaseLogIn(), $statement, $parameters);
}
function order($orderOption) {
    switch ($orderOption) {
        case 'N':
            $order = "order by Username";
            break;
        case 'M':
            $order = "order by post_content";
            break;
        case 'D':
            $order = "order by post_date asc";
            break;
        default:
            $order = "";
            break;
    }
    return $order;
}
function searchSwitch($searchOption, $order) {
    switch ($searchOption) {
       
        case 'N':
            $statement  = "select * from posts where Username like (:name)" . $order;
            $parameters = array(
                ':name' => "%" . $_POST['ForumSearch'] . "%"
            );
            break;
        case 'M':
            $statement  = "select * from posts where post_content like (:content)" . $order;
            $parameters = array(
                ':content' => "%" . $_POST['ForumSearch'] . "%"
            );
            break;
        case 'D':
            $statement  = "select * from posts where post_date = (:date)" . $order;
            $parameters = array(
                ':date' => $_POST['date']
            );
            break;
    }
    drawPosts(dataBaseLogIn(), $statement, $parameters);
}
function mainForum($MainForumArray,$MainForumSession) {
    if (isset($MainForumArray["msg"]) && !(isset($MainForumArray["msg"][5]))) {
        $tooShort = true;
    } else {
        $tooShort = false;
    }
    sendMsg(dataBaseLogIn(), $tooShort);
    if (isset($MainForumArray['submit']) && isset($MainForumArray['searchOption']) && $MainForumArray["submit"] == "Zoek") {

        $order = "";
        if (isset($MainForumArray['orderOption'])) {
           $order = order($MainForumArray['orderOption']);
        }
        searchSwitch($MainForumArray['searchOption'], $order);
    } else {
        drawTopics(dataBaseLogIn());
    }
    return $tooShort;
}
function searchError($search) {
    if (isset($search['submit']) && !(isset($search['searchOption'])) && $search["submit"] == "Zoek") {
        echo "<p style='color:red; margin-top:20px;'>Selecteer één van de opties</p>";
    }
}
function msgError($userSession, $tooShort) {
    if (!(isset($userSession["Username"]))) {
        echo "<p style='color:red; margin-top:20px;'>Log eerst in om een bericht te plaatsen</p>";
    } elseif ($tooShort) {
        echo "<p style='color:red; margin-top:20px;'>Je bericht moet minimaal 6 karakters bevatten</p>";
    }
}
function topicError($userSession) {
    if (!(isset($userSession["Username"]))) {
        echo "<p style='color:red; margin-top:20px;'>Log eerst in om een topic aan te maken</p>";
    }
}
function videoMain($videoPost) {

    
        if(!(isset($_POST['filterOption']))){
            $filter = "";
        }else{
        switch($_POST['filterOption']){
            case 'V':
            $filter = " and video_name like '%Vault%'";
                break;
            case 'D':
            $filter = " and video_name like '%dlc%'";
                break;
            case 'S':
            $filter = " and video_discription like '%S.P.E.C.I.A.L.%'";
                break;
            case 'T':
                $filter  = " and video_name like '%Fallout%' and video_name like '%Trailer%'";
            break;
        }
    }
    if (isset($_POST['order']) && $_POST['order']) {
        $order = "order by video_name";
    } else {
        $order = "";
    }
    
        if (isset($_POST["submit"]) && isset($_POST['searchOption']) && $_POST["submit"] == "Zoek" ) {

    
    switch ($_POST['searchOption']) {
            case 'N':
                $statement  = "select * from videos where video_name like (:name)".$filter.$order;

                break;
            case 'M':
                $statement  = "select * from videos where video_discription like (:name)".$filter. $order;

                break;     
        }
      
        $parameters = array(
            ':name' => "%" . $_POST['ForumSearch'] . "%"
        );
        
        videoShow(dataBaseLogIn(), $statement, $parameters);
    }else{
        if(isset($_POST['filterOption']) && !(isset($_POST['searchOption']))){
            $statement = "select * from videos where video_name like (:name)".$filter.$order;
            $parameters = array(
                ':name' => "%" . $_POST['ForumSearch'] . "%"
            );
            videoShow(dataBaseLogIn(), $statement, $parameters);
        }else{
        allVideos();
        }
    }
}


function videoSearchError($videoError) {
    if (isset($videoError['submit']) && !(isset($videoError['searchOption'])) && !(isset($videoError['filterOption'])) && $videoError["submit"] == "Zoek") {
        echo "<p style='color:red; margin-top:20px;'>Selecteer één van de opties</p>";
    }
}
function loginError($falsePass) {
    echo "<p style = 'color: red; margin-top: 20px; margin-bottom: 20px;'>De combinatie van wachtwoord en gebruikers naam klopt niet</p>";
}
function mainLogin($loginMainError) {
    
        $falsePass = logIn(dataBaseLogIn());
        return $returnError = array("returnError" => register(dataBaseLogIn()),"falsePass" => $falsePass);
    }
?>


<?php  if(true){echo "<div style='display:none;'>";}  ?>

<h1>hoi</h1>

<?php  if(true){ "</div>";} ?>