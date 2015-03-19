<?php include 'menu.php';?>

<div class="container">
  <div class="row">

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- textarea -->
          <form method="post" action="../status/addStatus">
          <div class="input-group">
            <textarea class="form-control status-text-wall" name="content" rows="3" style=""></textarea>
            <span class="input-group-addon">
              <button type="submit" name="wall_post_button" class="btn btn-primary btn-text-wall pull-right"><i class="glyphicon glyphicon-bullhorn"></i></button>
            </span>
          </div> <!-- textarea -->
          </form>
      </div>  
    </div>
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
      <div class="col-xs-12 col-md-12 feed">
        <div class="feed_body">
          <div class="row">
            <div class="col-xs-4 col-md-2 feed_profile">
              <img src="<?php echo($picture) ?>" alt="meta image" class="meta_image" />
              <form method="post" action="../user/showOtherUser">
              <input type="hidden" name="other_user_id" value="<?php echo($updateRow["user_id"])?>"/>
              <button class="otherUserButton" name="see_user_button"><span><?php echo($updateRow["firstname"] . " " . $updateRow["lastname"])?></span></button>
              </form>
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

<?php include 'footer.php';?>