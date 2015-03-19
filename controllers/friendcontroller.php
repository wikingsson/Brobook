<?php

Class Friendcontroller{


    public function addFriend(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $initial_status = 0;

        session_start();
        if(isset($_POST["add_friend"])){
            $checkFriendStm = $db->prepare("SELECT * FROM friends WHERE (friend_one = :currentUser AND friend_two = :userId) OR (friend_one = :userId AND friend_two = :currentUser )");
            $checkFriendStm->bindParam(":currentUser", $_SESSION["userId"]);
            $checkFriendStm->bindParam(":userId", $_POST["hidden_user_id"]);
            $checkFriendStm->execute();

            if($checkFriendStm->rowCount() == 0){
                if($_POST["hidden_user_id"] != $_SESSION["userId"]){
                    $addFriendStm = $db->prepare("INSERT INTO friends(friend_one, friend_two, status) VALUES (:friend1, :friend2, :status)");
                    $addFriendStm->bindParam(":friend1", $_SESSION["userId"]);
                    $addFriendStm->bindParam(":friend2", $_POST["hidden_user_id"]);
                    $addFriendStm->bindParam(":status", $initial_status);
                    $addFriendStm->execute();
                }
                else{
                    echo("You can't be friends with yourself bro!");
                }
            }
            else {
                echo("Already friends");
            }
        }
        header("location:../friend/showFriends");
    }

    public function acceptFriend(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $accepted = 1;
        session_start();
        if(isset($_POST["accept_friend"])){
            $acceptFriendStm = $db->prepare("UPDATE friends SET status = :accepted WHERE friend_one = :user_id AND friend_two = :currentUser");
            $acceptFriendStm->bindParam(":accepted", $accepted);
            $acceptFriendStm->bindParam(":user_id", $_POST["hid_user_id"]);
            $acceptFriendStm->bindParam(":currentUser", $_SESSION["userId"]);
            $acceptFriendStm->execute();
        }
        header("location:../friend/showFriends");

    }

    public function declineFriend(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $declined = 2;
        $declinedFriendStm = $db->prepare("UPDATE friends SET status = :declined");
        $declinedFriendStm->bindParam(":declined", $declined);
        $declinedFriendStm->execute();

        //Make sure you cant ask again?
    }

    public function showFriends(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        session_start();
        $showFriendsStm = $db->prepare("SELECT * FROM users AS U, friends AS F WHERE CASE WHEN F.friend_one = :currentUser THEN F.friend_two = U.user_id WHEN F.friend_two= :currentUser THEN F.friend_one= U.user_id END AND F.status= 1 ORDER BY U.lastname");
        $showFriendsStm->bindParam(":currentUser", $_SESSION["userId"]);
        //$showFriendsStm->execute();

        $showAllUsersStm = $db->prepare("SELECT * FROM users WHERE user_id != :currentUser");
        $showAllUsersStm->bindParam(":currentUser", $_SESSION["userId"]);

        $showFriendRequestStm = $db->prepare("SELECT * FROM users JOIN friends ON (friends.friend_one = users.user_id) WHERE friends.friend_two = :currentUser AND friends.status = 0");
        $showFriendRequestStm->bindParam(":currentUser", $_SESSION["userId"]);
        require_once "views/Friends.php";


    }

    public function deleteFriend(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $deleteFriendStm = $db->prepare("DELETE FROM friends WHERE ");

    }
}