<?php

Class Usercontroller{

    public function addUser(){
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        if(isset($_POST["register_submit"])){
            $stm = $db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
            $stm->bindParam(":firstname", $_POST["firstname"], PDO:: PARAM_STR);
            $stm->bindParam(":lastname", $_POST["lastname"], PDO:: PARAM_STR);
            $stm->bindParam(":email", $_POST["email"], PDO:: PARAM_STR);
            $stm->bindParam(":password", $_POST["password"], PDO:: PARAM_STR);
            $stm->execute();
        }

        // Need to Send user back to loginpage.
        header("location: /Brobook");
    }

    public function showForm(){
        require_once "views/login.php";
    }

    public function loginUser(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        if(isset($_POST["login_submit"])){
            $loginStm = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
            $loginStm->bindParam(":email", $_POST["email"], PDO:: PARAM_STR);
            $loginStm->bindParam(":password", $_POST["password"], PDO:: PARAM_STR);
            $loginStm->execute();
            $userId = $loginStm->fetch();

            if($loginStm->rowCount() == 1){
                session_start();
                $_SESSION["status"] = "loggedIn";
                $_SESSION["user"] = $userId["firstname"] . " " . $userId["lastname"];
                $_SESSION["userId"] = $userId["user_id"];

                header("location:../status/showStatus");
            }
            else{

                //redirect to login page with error message.
                echo "something went wrong!";

            }
        }

    }

    public function showUser(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        session_start();
        $showUserStm = $db->prepare("SELECT * FROM users JOIN status_updates ON (status_updates.user_id = users.user_id) WHERE users.user_id = :user_id ORDER BY status_updates.status_update_id DESC");
        $showUserStm->bindParam(":user_id", $_SESSION["userId"], PDO:: PARAM_INT);
        //$showUserStm->execute();

        require_once "views/profile.php";
    }

    public function updateUser(){
        //Change PP and other stuff
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        $updateUserStm = $db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, profile_img = :p_img WHERE user_id = :user_id");
        $updateUserStm->bindParam(":firstname", $_POST["first_name"], PDO:: PARAM_STR);
        $updateUserStm->bindParam(":lastname", $_POST["last_name"], PDO:: PARAM_STR);
        $updateUserStm->bindParam(":p_img", $_POST["profile_img"], PDO:: PARAM_STR);
        $updateUserStm->bindParam(":user_id", $_POST["user_id"], PDO:: PARAM_INT);

        if($updateUserStm->execute()){
            header("location:user/showUser");
        }

        //Send back to profile if everything went ok.
        //require_once "views/updateuser.php";
    }


    public function logoutUser(){
        session_unset();
        session_destroy();

        header("location: /BroBook");
    }

    public function deleteUser(){
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        $userDeleteStm = $db->prepare("DELETE FROM users WHERE user_id = :user_id");
        $userDeleteStm->bindParam("user_id", $_POST["user_id"], PDO:: PARAM_INT);
        $userDeleteStm->execute();

        $this->logoutUser();

        //require_once "views/updateuser.php";
    }
}