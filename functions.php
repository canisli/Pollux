<?php
function deleteAllCookies()
{
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, false);
    }
}

function getUsername()
{
    foreach ($_COOKIE as $key => $value) {
        if ($value != "admin") {
            return $key;
        }
    }
}

function studentLoggedIn()
{
    $loggedIn = false;

    foreach ($_COOKIE as $value) {
        if ($value != "admin") {
            $loggedIn = true;
        }
    }

    return $loggedIn;
}

?>