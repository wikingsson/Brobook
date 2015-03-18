
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Brobook</title>
  <meta name="description" content="Da shit">
  <meta name="author" content="Brobook">
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link href='../css/maincss.css' rel='stylesheet' type='text/css'>
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
        <a href="../status/showStatus" class="navbar-brand">BroBook</a>
      </div>
      <!-- Collection of nav links and other content for toggling -->
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="../status/showStatus">Home</a></li>
          <li class="active"><a href="../user/showUser">Profile</a></li>
           <li><a href="#">Friends</a></li>
          <li><a href="../message/showConversation">Messages</a></li>
        </ul>
        <div class="col-xs-8 col-md-8 center-block search">
            <div class="input-group stylish-input-group">
              <input type="text" class="form-control"  placeholder="Search" >
              <span class="input-group-addon">
                <button type="submit">
                  <span class="glyphicon glyphicon-search"></span>
                </button>  
              </span>
            </div>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php $user = $_SESSION["user"]; echo($user);?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#"> Preferences</a></li>
              <li><a href="#"> Edit Profile</a></li>
              <li class="#"></li>
              <li><a href="../user/logoutUser"> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid profile-header">
    <div class="container">

      <?php


      if($showOtherUserStm->execute()){
        $otherUserRow = $showOtherUserStm->fetch();
        if($otherUserRow["profile_img"] == null){
          $picture = "http://www.giacomazzi.org/ArchivioImmagini/2014/ANONYMOUS_Mask_of_Guy_Fawkes.jpg";
        }
        else{
          $picture = $otherUserRow["profile_img"];
        }
        ?>

        <div class="row profile-header-content">
          <div class="col-md-3 col-sm-3 col-xs-4 profile-pic">
            <img src="<?php echo($picture)?>" class="img-thumbnail"></div>
            <div class="col-md-9 col-sm-9 col-xs-8 profile-about">
              <h2><?php echo($otherUserRow["firstname"] . " " . $otherUserRow["lastname"])?></h2>
              <p><i class="glyphicon glyphicon-globe"></i>Sweden</p>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p><?php echo($otherUserRow["content"])?></p>
            </div>  
            </div>

              <?php
            }
            if($showOtherUserStm->execute()){
              while($profileRow = $showOtherUserStm->fetch()){
                ?>

                <form method="post" action="../status/deleteStatus">
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
                          <button type="submit" name="profile_delete_button" class="btn btn-default">
                            <span class="glyphicon glyphicon-trash"></span>
                          </button>
                        </div>
                        <div class="bottom_right">
                          <?php echo(substr($profileRow["created"],0,-3))?>
                        </div> 
                      </div>
                    </div>
                  </div>
                </form>

            <?php
          }
        }
        ?>


      </div> <!-- End Row -->
    </div> <!-- container -->

    <script src="../../Brobook/js/jquery.min.js" type="text/javascript"></script>
    <script src="../../Brobook/js/bootstrap.js"></script>
    <script src="../../Brobook/js/brobook.js"></script>
  </body>
  </html>