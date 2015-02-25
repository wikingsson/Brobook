<?php

    $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "root");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    $UpdateStm = $db->prepare("INSERT INTO status_updates(content, created) VALUES (:content, :created)");
    $UpdateStm->bindParam(":content", $_POST["content"], PDO:: PARAM_STR);
    $UpdateStm->bindParam(":created", $_POST["created"], PDO:: PARAM_STR);
    $UpdateStm->execute();

    $UpdateStm2 = $db->prepare("INSERT INTO users(firstname, lastname) VALUES (:firstname, :lastname)");
    $UpdateStm2->bindParam(":firstname", $_POST["firstname"], PDO:: PARAM_STR);
    $UpdateStm2->bindParam(":lastname", $_POST["lastname"], PDO:: PARAM_STR);

?>