<?php include 'menu.php';?>


<div class="container">
<div class="row">
  <div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
<<<<<<< HEAD
           <div class="panel-heading"><h4 class="fheader">Freind requests</h4></div>	
=======

           <!-- <div class="panel-heading"><h4 class="fheader">Friends</h4></div> -->

           <div class="panel-heading"><h4 class="fheader">Freind requests</h4></div>	

>>>>>>> origin/Rillvar
        <div class="panel-body">
            <?php
            if($showFriendRequestStm->execute()){
            while($updateRow = $showFriendRequestStm->fetch()){
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
<<<<<<< HEAD
              <button type="submit" name="accept_friend" value="" class="btn btn-default"><span>Accept Friend</span></button>
=======

              <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-circle"></span> Remove Friend</a>

              <button type="submit" name="" value="" class="btn btn-default"><span>Accept Friend</span></button>          
>>>>>>> origin/Rillvar
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
<<<<<<< HEAD
              <button type="submit" name="remove_friend" value="" class="btn btn-default"><span>Remove Friend</span></button>
=======
              <button type="submit" name="" value="" class="btn btn-default"><span>Remove Friend</span></button>

>>>>>>> origin/Rillvar
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
<<<<<<< HEAD
                  <button type="submit" name="add_friend" value="Add Friend" class="btn btn-default">Add Friend</button>
=======

                  <button type="submit" name="add_friend" value="Add Friend" class="btn btn-default">Add Friend</button>

                  <button type="submit" name="add_friend" value="Add Friend" class="btn btn-default"><span>Add Friend</span></button>

>>>>>>> origin/Rillvar
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

<?php include 'footer.php';?>

