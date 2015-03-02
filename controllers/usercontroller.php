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
    }


    public function logoutUser(){
        session_unset();
        session_destroy();

        //Back to login page.
    }

    public function deleteUser(){
        //delete account
    }
}