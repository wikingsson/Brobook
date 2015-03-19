<?php include 'menu.php';?>

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
            </div>
            </div>

              <?php
            }
            if($showOtherUserStm->execute()){
              while($profileRow = $showOtherUserStm->fetch()){
                ?>

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
                        <div class="bottom_left"></div>
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

<?php include 'footer.php';?>