<?php

Class Statuscontroller{

    public function addStatus(){
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        session_start();
        if(!empty($_POST["content"])){
            $addStatusStm = $db->prepare("INSERT INTO status_updates(content, user_id) VALUES (:content, :user_id)");
            $addStatusStm->bindParam(":content", $_POST["content"]);
            $addStatusStm->bindParam(":user_id", $_SESSION["userId"]);
            $addStatusStm->execute();
        }

        //Send back to where you came from profile or wall
        if(isset($_POST["profile_post_button"])){
            header("location:../user/showUser");
        }
        else if(isset($_POST["wall_post_button"])){
            header("location:../status/showStatus");
        }
    }

    public function updateStatus(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        $updateStatusStm = $db->prepare("UPDATE status_updates SET content = :content WHERE status_update_id = :su_id");
        $updateStatusStm->bindParam(":content", $_POST["content"]);
        $updateStatusStm->bindParam(":su_id", $_POST["su_id"]);
        $updateStatusStm->execute();

        //Send back to where you came from profile or wall
        if(isset($_POST["profile_update_button"])){
            header("location:user/showUser");
        }
        elseif(isset($_POST["wall_update_button"])){
            header("location:status/showStatus");
        }

    }

    public function showStatus(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        session_start();
        $showStatusStm = $db->prepare("SELECT * FROM status_updates SU, users U, friends F WHERE CASE WHEN F.friend_one = :curr_user THEN F.friend_two = U.user_id WHEN F.friend_two = :curr_user THEN F.friend_one = U.user_id END AND (U.user_id = SU.user_id) AND (F.friend_one = :curr_user OR F.friend_two = :curr_user) AND F.status = 1 ORDER BY SU.status_update_id DESC");

        $showStatusStm->bindParam(":curr_user", $_SESSION["userId"]);
        $showStatusStm->execute();

        require_once "views/wall.php";



    }

    public function deleteStatus(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $deleteStatusStm = $db->prepare("DELETE FROM status_updates WHERE status_update_id = :status_update_id");
        $deleteStatusStm->bindParam(":status_update_id", $_POST["hidden_status_id"]);
        $deleteStatusStm->execute();

        //Send back to wall or profile
        if(isset($_POST["profile_delete_button"])){
            header("location:../user/showUser");
        }
        elseif(isset($_POST["wall_delete_button"])){
            header("location:../status/showStatus");
        }

    }
}