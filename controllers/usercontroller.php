<?php

Class Usercontroller{

    public function addUser(){
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        if(isset($_POST["register_submit"])){
            $stm = $db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
            $stm->bindParam(":firstname", $_POST["firstname"]);
            $stm->bindParam(":lastname", $_POST["lastname"]);
            $stm->bindParam(":email", $_POST["email"]);
            $stm->bindParam(":password", $_POST["password"]);
            $stm->execute();
        }

        // Need to Send user back to loginpage.
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
                //Dont use header, use require.
                header("location:logincheck.php");
            }
            else{

                //redirect to login page with error message.
                echo "something went wrong!";

            }
        }
    }

    public function updateUser(){
        //Change PP and other stuff
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        $updateUserStm = $db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, profile_img = :p_img WHERE user_id = :user_id");
        $updateUserStm->bindParam(":firstname", $_POST["first_name"]);
        $updateUserStm->bindParam(":lastname", $_POST["last_name"]);
        $updateUserStm->bindParam(":p_img", $_POST["profile_img"]);
        $updateUserStm->bindParam(":user_id", $_POST["user_id"]);

        $updateUserStm->execute();

        //Send back to profile if everything went ok.
    }


    public function logoutUser(){
        session_unset();
        session_destroy();

        //Back to login page.
    }

    public function deleteUser(){
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        $userDeleteStm = $db->prepare("DELETE FROM users WHERE user_id = :user_id");
        $userDeleteStm->bindParam("user_id", $_POST["user_id"]);
        $userDeleteStm->execute();

        //Send to logout action.

    }
}