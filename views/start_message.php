
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
        <a href="../status/showStatus" class="navbar-brand">BroBook</a>
      </div>
      <!-- Collection of nav links and other content for toggling -->
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="../status/showStatus">Home</a></li>
          <li><a href="../user/showUser">Profile</a></li>
            <li><a href="../friend/showFriends">Friends</a></li>
            <li class="active"><a href="../message/showConversation">Messages</a></li>
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


  <div class="container">
  <div class="panel panel-default">
  <div class="panel-heading">
  <!--
    <div class="search"> 
      <div class="input-group stylish-input-group">


      </div>
    </div>
-->

  </div>
  <div class="panel-body">
    <div class="col-xs-6 col-md-4">
      <nav class="nav-sidebar">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#start_message" data-whatever="@getbootstrap"><i class="glyphicon glyphicon-plus"></i> Create Conversation</button>

          <div class="modal fade" id="start_message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Create Conversation</h4>
                </div>
                <div class="modal-body">
                  <form method="post" action="../message/searchUsers?go">
                    <div class="form-group">
                      <label for="recipient-name" class="control-label">User:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="control-label">Message:</label>
                      <input type="text" class="form-control" id="message-text">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" name="add_conversation" class="btn btn-primary">Add Conversation</button>
                </div>
                  </form>

              </div>
            </div>
          </div>
        <ul class="nav tabs">
          <?php
          //if($showConversationListStm->execute()){
            $tabNr = 1;
            $c_idArray = array();
          while($convRow = $showConversationListStm->fetch()){

                if($tabNr == 1){
                    $isActive = "active";
                }
                else{
                    $isActive = "";
                }
                array_push($c_idArray, $convRow["conversation_id"]);
          ?>
              <form class="conv_form" method="post" action="message/showConversation">
                <input type="hidden" class="hidden_cid" name="c_id" value="<?php echo($convRow["conversation_id"])?>">
                <li class="<?php echo($isActive)?>"><a href="#tab<?php echo($convRow["conversation_id"])?>" class="conv_link" name="linkSubmit" data-toggle="tab"><?php echo($convRow["conv_name"])?></a></li>
              </form>
            <?php

                $tabNr++;
            }
          //}
          ?>
        </ul>
      </nav>
    </div>

    <!-- tab content -->
    <div class="col-xs-12 col-md-8">
      <div class="tab-content">
        <?php
        /*

        //Counts how many conversations there are so the right amount of tabs is created
        $count = $tabNr - 1;
        $tabNr2 = 1;
        //print_r($c_idArray);

        //Loops through the number of conversations and creates them.
        for($i = 0; $i < $count; $i++){
            //Sets the first tab to active.
            if($tabNr2 == 1){
                $isActive2 = "active";
            }
            else{
                $isActive2 = "";
            }
        */
        ?>
          <div class="tab-pane active<?php //echo($isActive2)?> text-style" id="tab<?php //$id = array_shift($c_idArray); echo($id)?>">
              <?php
              //$messageRow = $showMessageStm->fetchAll();

              //print_r($messageRow);

              ?>



          </div>
          <?php
            //$tabNr2++;

        //}

        ?>


</div> <!-- tab end -->
</div> <!-- conv end -->
</div> <!-- panel body -->
</div> <!-- panel end -->
</div> <!-- container -->

<script src="../../Brobook/js/jquery.min.js" type="text/javascript"></script>
<script src="../../Brobook/js/bootstrap.js"></script>
<script src="../../Brobook/js/brobook.js"></script>

</body> 
</html>
