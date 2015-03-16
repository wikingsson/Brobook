<?php

Class Messagecontroller{

    public function addConversation(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $addConversationStm = $db->prepare("INSERT INTO conversations(conv_name) VALUES :conv_name");
        $addConversationStm->bindParam(":conv_name", $user_names);
        $addConversationStm->execute();
        $last = $db->lastInsertId();

        $addConversationUsersStm = $db->prepare("INSERT INTO conversation_users(conversation_id, user_id) VALUES :last_conv_id, :user_id");
        $addConversationUsersStm->bindParam(":last_conv_id", $last);
        $addConversationUsersStm->bindParam(":user_id", $_SESSION["current_user"]);
        $addConversationUsersStm->execute();

        //Add ability to add more users.
    }

    public function addConversationUsers(){

        //Probably same SQL as above.

    }

    public function showConversation(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        session_start();

        //$messageSQL = "SELECT * FROM messages JOIN users ON (users.user_id = messages.user_id)";
        $showMessageStm = $db->prepare("SELECT * FROM messages JOIN users ON (users.user_id = messages.user_id) WHERE messages.conversation_id = :c_id");
        $showMessageStm->bindParam(":c_id", $_POST["c_id"]);
        $showMessageStm->execute();

        //Don't know where to place this but maybe here?
        $showConversationListStm = $db->prepare("SELECT * FROM conversations AS CON JOIN conversation_users AS CU ON (CON.conversation_id = CU.conversation_id) JOIN users AS U ON(U.user_id = CU.user_id) WHERE U.user_id = :user_id");
        $showConversationListStm->bindParam(":user_id", $_SESSION['userId']);
        $showConversationListStm->execute();

        require_once "views/start_message.php";

    }

    public function deleteConversation(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        $deleteConversationStm = $db->prepare("DELETE FROM conversation_users WHERE conversation_id = :c_id");
        $deleteConversationStm->bindParam(":c_id", $_POST["c_id"]);
        $deleteConversationStm->execute();

        $deleteConversationStm2 = $db->prepare("DELETE FROM conversations WHERE conversation_id = :c_id");
        $deleteConversationStm2->bindParam(":c_id", $_POST["c_id"]);
        $deleteConversationStm2->execute();
    }

    public function addMessage(){

        $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
        session_start();
        $num = 1;
        $addMessageStm = $db->prepare("INSERT INTO messages(content, conversation_id, user_id, status) VALUES :content, :c_id, :user_id, :status");
        $addMessageStm->bindParam(":content", $_POST["message_content"]);
        $addMessageStm->bindParam(":c_id", $_POST["hidden_c_id"]);
        $addMessageStm->bindParam(":user_id", $_SESSION["userId"]);
        $addMessageStm->bindParam(":status", $num);
        $addMessageStm->execute();
    }
}