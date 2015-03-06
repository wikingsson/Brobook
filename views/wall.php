<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Brobook</title>
    <meta name="description" content="Da shit">
    <meta name="author" content="Brobook">
    <link href="../../Brobook/css/bootstrap.css" rel="stylesheet">
    <link href='../../Brobook/css/maincss.css' rel='stylesheet' type='text/css'>
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
                <li class="active"><a href="wall.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="start_message.php">Messages</a></li>
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
                    <li><a href="#"> Logout</a></li>
                   </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
  <div class="row">
  <div class="input-group status-box"><!-- textarea -->
    <form method="post" action="insert.php">
      <textarea class="form-control status-text" name="content" rows="3" style="width:1090px; height:77px;"></textarea>
        <span class="group-addon pull-right">
            <button type="submit" name="post_button" class="btn btn-primary btn-text"><i class="glyphicon glyphicon-bullhorn"></i></button>
         </span>   
    </form>
  </div><!-- textarea -->
    <div class="span8">
        <?php
        if($showStatusStm->execute()){
        while($updateRow = $showStatusStm->fetch()){
            if($updateRow["profile_img"] == null){
                $picture = "http://www.giacomazzi.org/ArchivioImmagini/2014/ANONYMOUS_Mask_of_Guy_Fawkes.jpg";
            }
            else{
                $picture = $updateRow["profile_img"];
            }
        ?>
      <div class="col-xs-8 col-md-12 feed">
        <div class="feed_body">
          <div class="row">
            <div class="col-xs-4 col-md-2 feed_profile">
              <img src="<?php echo($picture) ?>" alt="meta image" class="meta_image" />
              <a href="profile.php"><?php echo($updateRow["firstname"] . " " . $updateRow["lastname"])?></a>
            </div>
            <div class="col-xs-12 col-md-10 feed_text">
            <p><?php echo($updateRow["content"])?></p>
            </div>
          </div>
        </div>
        <hr class="feed_hr" />
        <div class="bottom">
          <div class="row">
            <div class="bottom_left">

            </div>
            <div class="bottom_right">
                <?php echo(substr($updateRow["created"],0,-3))?>
            </div> 
          </div>
        </div>
      </div>
       <?php
            }
        }
       ?>

    </div> <!-- end span8 -->
    </div> <!-- End Row -->
    </div> <!-- container -->

      <script src="../../Brobook/js/jquery.min.js" type="text/javascript"></script>
      <script src="../../Brobook/js/bootstrap.js"></script>
      <script src="../../Brobook/js/brobook.js"></script>
</body>
</html>
