<?php include 'menu.php';?>



    <div class="container">
        <?php


        if($showUserStm->execute()){
            $userRow = $showUserStm->fetch();
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
                <p><i class="glyphicon glyphicon-globe"></i> <?php echo($userRow["country"])?> </p>
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- textarea -->
                <form method="post" action="../status/addStatus">
                <div class="input-group">
                  <textarea class="form-control status-text" name="content" rows="3" style=""></textarea>
                  <span class="input-group-addon">
                    <button type="submit" name="profile_post_button" class="btn btn-primary btn-text pull-right"><i class="glyphicon glyphicon-bullhorn"></i></button>
                  </span>
                </div> <!-- textarea -->
                </form>
            </div>  
            </div>

              <?php

            }
            if($showUserStm2->execute()){
              while($profileRow = $showUserStm2->fetch()){
                ?>

                <form method="post" action="../status/deleteStatus">
                  <div class="col-xs-12 col-md-12 feed">
                    <div class="feed_body">
                      <div class="row">
                        <div class="col-xs-4 col-md-2 feed_profile">
                          <img src="<?php echo($picture)?>" alt="meta image" class="meta_image" />
                         <p><?php echo($profileRow["firstname"] . " " . $profileRow["lastname"])?></p>
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

<?php include 'footer.php';?>
