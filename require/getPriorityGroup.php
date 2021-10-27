<?php

include_once("../includes/database.php");
include_once("../includes/constructor.php");

$query = "SELECT * FROM priority_groups";
$priorityGroups = [];

$stmt = $database->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$stmt->bind_result($priorityId,$priority_group);

while ($stmt->fetch()){
    $priorityGroup = new priorityGroup($priorityId, $priority_group);
    $priorityGroups[] = $priorityGroup;
}
