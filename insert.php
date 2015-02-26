<?php
    $db = new PDO("mysql:host=localhost;dbname=BroBook;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


?>