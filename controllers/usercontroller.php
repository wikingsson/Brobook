<?php

Class Usercontroller{

    public function addUser(){
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        if(isset($_POST["register_submit"])){

            $emailError = "";
            $email = "";
            $passwordError = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["email"])) {
                    $emailError = "Email is required";
                    header("location: /Brobook");
                    echo($emailError);
                }
                else if(empty($_POST["password"])){
                    $passwordError = "Password is required";
                    header("location: /Brobook");
                }
                else{
                    $email = ($_POST["email"]);
                    // function that checks if e-mail address is ok
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailError = "Invalid email format";
                        echo($emailError);
                    }
                    else{
                        $stm = $db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
                        $stm->bindParam(":firstname", $_POST["firstname"]);
                        $stm->bindParam(":lastname", $_POST["lastname"]);
                        $stm->bindParam(":email", $_POST["email"]);
                        $stm->bindParam(":password", $_POST["password"]);
                        $stm->execute();
                    }
                }
            }
        }
        // Need to Send user back to loginpage.
        $this->showForm();
    }

    // Validation needed

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
                $this->showForm();
                echo "something went wrong!";

            }
        }

    }

    // Validation of email and password needed

    public function showUser(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        session_start();
        $showUserStm = $db->prepare("SELECT * FROM users JOIN status_updates ON (status_updates.user_id = users.user_id) WHERE users.user_id = :user_id ORDER BY status_updates.status_update_id DESC");
        $showUserStm->bindParam(":user_id", $_SESSION["userId"]);
        //$showUserStm->execute();

        require_once "views/profile.php";
    }

    public function showOtherUser(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        session_start();
        $showOtherUserStm = $db->prepare("SELECT * FROM users JOIN status_updates ON (status_updates.user_id = users.user_id) WHERE users.user_id = :user_id");
        $showOtherUserStm->bindParam(":user_id", $_POST["userId"]);
        //$showOtherUserStm->execute();

        require_once "views/other_user_profile.php";
    }

    public function showAllUsers(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        session_start();
        $showAllUsersStm = $db->prepare("SELECT * FROM users");
        $showAllUsersStm->bindParam(":user_id", $_SESSION["userId"]);
        //$showAllUsersStm->execute();

        require_once "views/Friends.php";


    }

    public function updateUser(){
        //Change PP and other stuff
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        $updateUserStm = $db->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, profile_img = :p_img WHERE user_id = :user_id");
        $updateUserStm->bindParam(":firstname", $_POST["first_name"]);
        $updateUserStm->bindParam(":lastname", $_POST["last_name"]);
        $updateUserStm->bindParam(":p_img", $_POST["profile_img"]);
        $updateUserStm->bindParam(":user_id", $_POST["user_id"]);

        if($updateUserStm->execute()){
            header("location:user/showUser");
        }

        //Send back to profile if everything went ok.
        //require_once "views/updateuser.php";
    }


    public function logoutUser(){
        session_start();
        session_unset();
        session_destroy();

        header("location: /BroBook");
    }

    public function deleteUser(){
        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");

        $userDeleteStm = $db->prepare("DELETE FROM users WHERE user_id = :user_id");
        $userDeleteStm->bindParam("user_id", $_POST["user_id"]);
        $userDeleteStm->execute();

        $this->logoutUser();

        //require_once "views/updateuser.php";
    }
}