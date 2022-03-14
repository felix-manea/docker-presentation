<?php

require_once 'classes/app.class.php';

$app = new App();
if ($app->canConnectToDatabase()) {
    $title = "List users from database";
    $users = $app->getUsersFromDatabase();
} else {
    $title = "List users from array";
    $users = $app->getUsersFromArray();
}

$app->displayUsers($title, $users);