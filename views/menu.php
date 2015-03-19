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
          <li class="active"><a href="../status/showStatus">Home</a></li>
          <li><a href="../user/showUser">Profile</a></li>
            <li><a href="../friend/showFriends">Friends</a></li>
            <li><a href="../message/showConversation">Messages</a></li>
        </ul>
        <!--
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
        -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php $user = $_SESSION["user"]; echo($user);?><b class="caret"></b></a>
            <ul class="dropdown-menu">
             <li><a href="#" data-toggle="modal" data-target="#new-list">Settings</a>
                </li>
              <li><a href="#"> Contact Support</a></li>
              <li class="#"></li>
              <li><a href="../user/logoutUser"> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<div class="modal fade" id="new-list" tabindex="-1" role="dialog" aria-labelledby="new-list" aria-hidden="true">
  <div id="modulis" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <h3>Change Settings</h3>
        <form role="form">
          <div class="form-group">
            <input type="" class="form-control"  placeholder="First Name">
            <br>
            <input type="" class="form-control"  placeholder="Last Name">
            <br>
            <input type="" class="form-control"  placeholder="Change Profile image">
 
      </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="btn-group btn-group-lg btn-group-justified">
          <a href="#" class="btn btn-success" data-dismiss="modal">Save</a>
          <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</div>