<?php
    $db = new PDO("mysql:host=localhost;dbname=BroBook", "root", "root");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    if(isset($_POST["delete_button"])){
        $deleteStm = $db->prepare("DELETE FROM status_updates WHERE status_update_id = :status_update_id");
        $deleteStm->bindParam(":status_update_id", $_POST["hidden_status_id"]);

        if($deleteStm->execute()){
            header("location:profile.php");
        }
        else{
            echo "something went blA";
        }

    }