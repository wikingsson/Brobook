<?php

    session_start();

    $db = new PDO("mysql:host=localhost;dbname=brobook;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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
  <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">BroBook</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="wall.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li class="active"><a href="message.php">Messages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php $user = $_SESSION["user"]; echo($user);?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"> Preferences</a></li>
                    <li><a href="#"> Contact Support</a></li>
                    <li class="#"></li>
                    <li><a href="#"> Logout</a></li>
                   </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="conversationList">
        <input type="submit" name="createConversation" value="Create Conversation" />
        <?php
        $conversationStm = $db->prepare("SELECT * FROM conversation_users JOIN conversation ON (conversation_users.conversation_id = conversation.conversation_id) JOIN users ON (users.user_id = conversation_users.user_id) WHERE users.user_id = :userId");
        $conversationStm->bindParam(":userId", $_SESSION["userId"]);
        if($conversationStm->execute()){
            while($convRow = $conversationStm->fetch()){
            ?>
                <p class="conversationName"><a><?php echo($convRow["name"])?></a></p>
            <?php
            }
        }
        ?>
    </div>
    <?php
    //$currentUserId = 3;
    $participantStm = $db->prepare("SELECT U.firstname, U.lastname FROM users AS U, friends AS F WHERE CASE WHEN F.friend_one = :currentUser THEN F.friend_two = U.user_id WHEN F.friend_two= :currentUser THEN F.friend_one= U.user_id END AND F.status= 2 ORDER BY U.lastname");
    $participantStm->bindParam(":currentUser", $_SESSION["userId"]);
    $participantStm->execute();
    ?>
    <div class="conversationParticipants">
        <ul>
            <?php
            while($participantRow = $participantStm->fetch()){
                ?>
                <li><a><?php echo($participantRow["firstname"] . " " . $participantRow["lastname"])?></a></li>
            <?php
            }?>
        </ul>
        <div id="participantList">

        </div>
    </div>
  <div class="row">
  <div class="col-xs-8 col-md-12">

  <?php
  $messageStm = $db->prepare("SELECT * FROM messages");
  if($messageStm->execute()){
      while($messageRow = $messageStm->fetch()){
      ?>
      <div class="media">
          <div class="media-left">
              <img class="media-object" src="" alt="...">
              </a>
          </div>
          <div class="media-body">
              <h4 class="media-heading"></h4>
              <p></p>
          </div>
      </div>

      <?php
      }
  }

  ?>
    <div class="col-xs-8 col-md-12 feed_textarea">
        <form method="post" action="">
            <textarea class="form-control" rows="2"></textarea>
            <div class="pull-right col-xs-4 col-md-2 profile_button">
                <button type="submit" name="send_message_button" class="btn btn-primary"><i class="glyphicon glyphicon-bullhorn"></i></button>
            </div>
        </form>
    </div><!-- End Row -->
    </div> <!-- container -->

      <script src="js/jquery.min.js" type="text/javascript"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/brobook.js"></script>
</body>
</html>
