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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Brobook</title>
    <meta name="description" content="Da shit">
    <meta name="author" content="Brobook">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href='css/maincss.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
<div class="container">
  <div class="row">


<form class="form-horizontal pull-right" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Login</legend>
    </div>
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p></p>
      </div>
    </div>


    <div class="control-group">
      <!-- Button -->
      <div class="controls">
      <input class="btn btn-success " type="submit" name="login_submit" value="Login" required=""/>
      </div>
    </div>
  </fieldset>
</form>

<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <!-- first name -->
      <label class="control-label"  for="first_name">First Name</label>
      <div class="controls">
        <input type="text" id="first_name" name="firstname" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Last Name -->
      <label class="control-label"  for="last_name">Last Name</label>
      <div class="controls">
        <input type="text" id="last_name" name="lastname" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
      <input class="btn btn-success " type="submit" name="register_submit" value="Register" required=""/>
      </div>
    </div>
  </fieldset>
</form>

</div> <!-- row -->
</div> <!-- container -->


</body>
</html>