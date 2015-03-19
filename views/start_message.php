<?php include 'menu.php';?>


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
                <div class="modal-header"><h3>Create conversation</h3>
                </div>
                <div class="modal-body">
                  <form method="post" action="../message/addConversation">
                    <div class="form-group">
                      <div class="btn-group"> <!-- dropdown -->
                        <select  id="friend_select" name="select_friend" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <option value="">Select Friend</option>
                            <?php while($friendRow = $showFriendsStm->fetch()){
                                ?>
                                <option id="<?php echo($friendRow["firstname"])?>" value="<?php echo($friendRow["user_id"]);?>"><?php echo($friendRow["firstname"] . " " . $friendRow["lastname"])?></option>
                            <?php
                            }?>
                        </select>
                          <input name="hidden_conv_name" id="hidden_firstname" type="hidden" value=""/>
                      </div> <!-- dropdown -->
                      </div>
                      </div>
                      <div class="form-group">
                          <label for="message-text" class="control-label">Message:</label>
                          <textarea name="first_message_content" class="form-control status-text" id="message-text"></textarea>
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

<?php include 'footer.php';?>
