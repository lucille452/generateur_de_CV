<?php
function getInfoUserSession($bdd, $userID)
{
    $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
    $user->execute([$userID]);
    return $user;
}