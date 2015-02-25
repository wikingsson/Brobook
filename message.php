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
                <li><a href="index.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li class="active"><a href="message.php">Messages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, User <b class="caret"></b></a>
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
  <div class="col-xs-8 col-md-12">
     
     <div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="http://gfx.bloggar.aftonbladet-cdn.se/wp-content/blogs.dir/428/files/2014/11/78.jpg" alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Per Hammar</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>




   <div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="https://babyjennifer.files.wordpress.com/2010/02/110830b2.jpg" alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Tsatsiki</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</div>

    <div class="col-xs-8 col-md-12 feed_textarea">
      <textarea class="form-control" rows="2"></textarea>
      <div class="pull-right col-xs-4 col-md-2 profile_button">
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-bullhorn"></i></button>
      </div>
    </div>
    </div> <!-- End Row -->
    </div> <!-- container -->

      <script src="js/jquery.min.js" type="text/javascript"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/brobook.js"></script>
</body>
</html>
