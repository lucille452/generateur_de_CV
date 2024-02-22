<?php
function getInfoUserSession($bdd, $userID)
{
    $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
    $user->execute([$userID]);
    return $user;
}

function updateUser($bdd, $id, $lastName, $firstName, $email, $phoneTel, $username)
{
    $updateUser = $bdd->prepare("UPDATE users SET Last_name=?, First_name=?, Email=?, Phone_tel=?, Username=? WHERE User_id=?");
    $updateUser->execute([$lastName, $firstName, $email, $phoneTel, $username, $id]);
}
function showUpdateUser($user)
{
    echo "<form style='background-color: #1e1e1e; padding: 10px; border-radius: 10px' action='' method='post'>";
    echo "<input type='text' name='lastName2' value='{$user['Last_name']}'>";
    echo "<input type='text' name='firstName2' value='{$user['First_name']}'>";
    echo "<input type='email' name='email2' value='{$user['Email']}'>";
    echo "<input type='tel' name='phoneTel2' value='{$user['Phone_tel']}'>";
    echo "<input type='text' name='username2' value='{$user['Username']}'>";
    echo "<input type='hidden' name='id2' value='{$user['User_id']}'>";
    echo "<input style='width: 10vh; background-color: #b99d21; color: white; border-radius: 5px' type='submit' name='updateUser2' value='Modifier'>";
    echo "</form>";
}

function updatePassword($bdd, $username, $email, $password)
{
    $updatePassword = $bdd->prepare("UPDATE users SET Password=? WHERE Email=? AND Username=?");
    $updatePassword->execute([$password, $email, $username]);
}
