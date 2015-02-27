<?php
    $db = new PDO("mysql:host=localhost;dbname=BroBook", "root", "root");

    if(isset($_POST["register_submit"])){
        $stm = $db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
        $stm->bindParam(":firstname", $_POST["firstname"]);
        $stm->bindParam(":lastname", $_POST["lastname"]);
        $stm->bindParam(":email", $_POST["email"]);
        $stm->bindParam(":password", $_POST["password"]);
        $stm->execute();
        echo("You´re signed up");

    }


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
            header("location:logincheck.php");
        }
        else{
            echo "something went wrong!";
        }
    }
?>
<html>
<head>
    <title>Logga In - BroBook</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="inlogForm">
            <form method="post">
                <input class="headerLogIn" placeholder="Email" type="text" name="email"/>
                <input class="headerLogIn" placeholder="PASSWORD" type="password" name="password"/>
                <input class="logInButton" type="submit" value="Logga in" name="login_submit"/>
            </form>
        </div>
    </div>
    <div id="content">
        <form method="post">
            <input class="signUpInput" type="text" name="firstname" placeholder="FIRST NAME" required=""/>
            <input class="signUpInput" type="text" name="lastname" placeholder="LAST NAME" required=""/>
            <input class="signUpInput" type="text" name="email" placeholder="EMAIL" required=""/>
            <input class="signUpInput" type="password" name="password" placeholder="PASSWORD" required=""/><br/>
            <input class="signUpButton" type="submit" name="register_submit" value="REGISTER" required=""/>
        </form>
    </div>
</div>
</body>
</html>