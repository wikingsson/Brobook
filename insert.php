<?php
    $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    session_start();

    if(isset($_POST["post_button"])){
        if($_POST["content"] != null ){
        $UpdateStm = $db->prepare("INSERT INTO status_updates(content, user_id) VALUES (:content, :user_id)");
        $UpdateStm->bindParam(":content", $_POST["content"], PDO:: PARAM_STR);
        $UpdateStm->bindParam(":user_id", $_SESSION["userId"], PDO:: PARAM_STR);
        $UpdateStm->execute();

        header("location:wall.php");
        }
        else{
            header("location:wall.php");
        }
    }

    if(isset($_POST["profile_post_button"])){
        if($_POST["profile_content"] != null){
        $UpdateStm2 = $db->prepare("INSERT INTO status_updates(content, user_id) VALUES (:content, :user_id)");
        $UpdateStm2->bindParam(":content", $_POST["profile_content"], PDO:: PARAM_STR);
        $UpdateStm2->bindParam(":user_id", $_SESSION["userId"], PDO:: PARAM_STR);
        $UpdateStm2->execute();

        header("location:profile.php");
        }
        else{
            header("location:profile.php");
        }
    }

?>