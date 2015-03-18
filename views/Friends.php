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
          <li><a href="../user/showUser">Profile</a></li>
            <li class="active"><a href="../friend/showFriends">Friends</a></li>
            <li><a href="../message/showConversation">Messages</a></li>
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
              <li><a href="../user/logoutUser"> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<div class="container">
<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
           <div class="panel-heading"><h4 class="fheader">Freind requests</h4></div>	
        <div class="panel-body">
            <?php
            if($showFriendsStm->execute()){
            while($updateRow = $showFriendsStm->fetch()){
            if($updateRow["profile_img"] == null){
                $picture = "http://www.giacomazzi.org/ArchivioImmagini/2014/ANONYMOUS_Mask_of_Guy_Fawkes.jpg";
            }
            else{
                $picture = $updateRow["profile_img"];
            }
            ?>
          <div class="pull-left well">
             <center>
              <a href=""><img src="<?php echo($picture)?>" name="" width="140" height="140" class="img-circle"></a>
              <h4><?php echo($updateRow["firstname"] . " " . $updateRow["lastname"])?></h4>
              <button type="submit" name="" value="" class="btn btn-default"><span>Accept Friend</span></button>          
              </center>
          </div>
            <?php
            }
            }
            ?>

        </div><!-- panel -->
      </div><!-- body panel -->
  </div><!-- col -->
  <div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
           <div class="panel-heading"><h4 class="fheader">Friends</h4></div>	
        <div class="panel-body">
            <?php
            if($showFriendsStm->execute()){
            while($updateRow = $showFriendsStm->fetch()){
            if($updateRow["profile_img"] == null){
                $picture = "http://www.giacomazzi.org/ArchivioImmagini/2014/ANONYMOUS_Mask_of_Guy_Fawkes.jpg";
            }
            else{
                $picture = $updateRow["profile_img"];
            }
            ?>
          <div class="pull-left well">
             <center>
              <a href=""><img src="<?php echo($picture)?>" name="" width="140" height="140" class="img-circle"></a>
              <h4><?php echo($updateRow["firstname"] . " " . $updateRow["lastname"])?></h4>
              <button type="submit" name="" value="" class="btn btn-default"><span>Remove Friend</span></button>
              </center>
          </div>
            <?php
            }
            }
            ?>

        </div><!-- panel -->
      </div><!-- body panel -->
  </div><!-- col -->
    <div class="col-xs-12  col-md-6">
  <div class="panel panel-default">
           <div class="panel-heading"><h4 class="fheader">People you may know</h4></div>
        <div class="panel-body">
            <?php
            if($showAllUsersStm->execute()){
            while($userRow = $showAllUsersStm->fetch()){
            if($userRow["profile_img"] == null){
                $picture = "http://www.giacomazzi.org/ArchivioImmagini/2014/ANONYMOUS_Mask_of_Guy_Fawkes.jpg";
            }
            else{
                $picture = $userRow["profile_img"];
            }
            ?>
          <form method="post" action="../friend/addFriend">
              <div class="pull-left well">
                 <center>
                  <a href=""><img src="<?php echo($picture)?>" name="" width="140" height="140" class="img-circle"></a>
                  <h4><?php echo($userRow["firstname"] . " " . $userRow["lastname"])?></h4>
                  <button type="submit" name="add_friend" value="Add Friend" class="btn btn-default"><span>Add Friend</span></button>
                 </center>
              </div>
          </form>
            <?php
            }
            }
            ?>
        </div><!-- panel -->
      </div>  <!-- body panel -->
    </div><!-- col -->
</div><!-- row -->
</div> <!-- container -->


<script src="../../Broobook/js/jquery.min.js" type="text/javascript"></script>
<script src="../../Broobook/js/bootstrap.js"></script>
<script src="../../Broobook/js/brobook.js"></script>
</body> 
</html>
