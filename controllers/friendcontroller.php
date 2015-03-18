<?php

Class Friendcontroller{


    public function addFriend(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $initial_status = 0;
        $addFriendStm = $db->prepare("INSERT INTO friends(friend_one, friend_two, status) VALUES :friend1, :friend2, :status");
        $addFriendStm->bindParam(":friend1", $_SESSION["current_user"]);
        $addFriendStm->bindParam(":friend2", $_POST["user_id"]);
        $addFriendStm->bindParam(":status", $initial_status);
        $addFriendStm->execute();
    }

    public function acceptFriend(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $accepted = 1;
        $acceptFriendStm = $db->prepare("UPDATE friends SET status = :accepted");
        $acceptFriendStm->bindParam(":accepted", $accepted);
        $acceptFriendStm->execute();
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

        $showAllUsersStm = $db->prepare("SELECT * FROM users u LEFT JOIN friends f ON f.friend_one = u.user_id OR f.friend_two = u.user_id WHERE f.friend_one IS NULL");


        require_once "views/Friends.php";


    }

    public function deleteFriend(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $deleteFriendStm = $db->prepare("DELETE FROM friends WHERE ");

    }
}