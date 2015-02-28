<?php
    session_start();

    $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Brobook</title>
    <meta name="description" content="Da shit">
    <meta name="author" content="Brobook">
    <link href="../../../Brobook/css/bootstrap.css" rel="stylesheet">
    <link href='../../../Brobook/css/maincss.css' rel='stylesheet' type='text/css'>
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
                <li class="active"><a href="profile.php">Profile</a></li>
                <li><a href="message.php">Messages</a></li>
            </ul>
              <div class="col-xs-8 col-md-8 center-block">
                  <div class="search"> 
                      <div class="input-group stylish-input-group">
                          <input type="text" class="form-control"  placeholder="Search" >
                          <span class="input-group-addon">
                              <button type="submit">
                                  <span class="glyphicon glyphicon-search"></span>
                              </button>  
                          </span>
                      </div>
                  </div>
              </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php $user = $_SESSION["user"]; echo($user);?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"> Preferences</a></li>
                    <li><a href="#"> Contact Support</a></li>
                    <li class="#"></li>
                    <li><a href="logout.php"> Logout</a></li>
                   </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid profile-header">
  <div class="container">

      <?php
      $userFetch = $db->prepare("SELECT * FROM users WHERE user_id = :userId");
      $userFetch->bindParam(":userId", $_SESSION["userId"], PDO:: PARAM_STR);


      if($userFetch->execute()){
            $userRow = $userFetch->fetch();
            if($userRow["profile_img"] == null){
                 $picture = "http://www.giacomazzi.org/ArchivioImmagini/2014/ANONYMOUS_Mask_of_Guy_Fawkes.jpg";
            }
            else{
                 $picture = $userRow["profile_img"];
            }

      ?>

    <div class="row profile-header-content">
      <div class="col-md-3 col-sm-3 col-xs-4 profile-pic">
      <img src="<?php echo($picture)?>" class="img-thumbnail"></div>
      <div class="col-md-9 col-sm-9 col-xs-8 profile-about">
        <h2><?php echo($userRow["firstname"] . " " . $userRow["lastname"])?></h2>
        <p><i class="glyphicon glyphicon-globe"></i>Sweden</p>
      <form method="post" action="insert.php">
        <div class="col-xs-8 col-md-12 feed_textarea">
              <textarea name="profile_content" class="form-control" rows="2" required></textarea>
        <div class="pull-right col-xs-4 col-md-2 profile_button">
          <button name="profile_post_button" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-bullhorn"></i></button>
          </div>
        </div>
      </form>
      <?php
      }
      $profileFetch = $db->prepare("SELECT * FROM status_updates
                                JOIN users ON (users.user_id = status_updates.user_id)
                                WHERE (users.user_id = :user_id)
                                ORDER BY created DESC");
      $profileFetch->bindParam(":user_id", $_SESSION["userId"], PDO:: PARAM_STR);
      if($profileFetch->execute()){
          while($profileRow = $profileFetch->fetch()){
      ?>

      <form method="post" action="delete.php">
        <div class="col-xs-12 col-md-12 feed">
        <div class="feed_body">
          <div class="row">
            <div class="col-xs-4 col-md-2 feed_profile">
              <img src="<?php echo($picture)?>" alt="meta image" class="meta_image" />
              <a href="#"><?php echo($profileRow["firstname"] . " " . $profileRow["lastname"])?></a>
            </div>
            <div class="col-xs-12 col-md-10 feed_text">
            <p><?php echo($profileRow["content"])?></p>
            </div>
          </div>
        </div>
        <hr class="feed_hr" />
        <div class="bottom">
          <div class="row">
            <div class="bottom_left">
                <input type="hidden" name="hidden_status_id" value="<?php echo($profileRow["status_update_id"])?>"/>
                <input type="submit" value="DELETE" name="delete_button"/>
            </div>
            <div class="bottom_right">
                <?php echo(substr($profileRow["created"],0,-3))?>
            </div> 
          </div>
        </div>
      </div>
    </form>
      </div>
    </div>
    <?php
         }
      }
    ?>

  </div>
</div>
<div class="container">
  <div class="row">

    </div> <!-- End Row -->
    </div> <!-- container -->

      <script src="js/jquery.min.js" type="text/javascript"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/brobook.js"></script>
</body>
</html>