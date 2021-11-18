<?php
$db_user = "smit.project";
$db_pass = "objectNotFound";
$db_name = "smit+";

$database = new PDO('mysql:host=localhost;dbname='. $db_name .';charset=utf8', $db_user, $db_pass);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);