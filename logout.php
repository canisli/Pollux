<?php
include('templates/header.html');
include('functions.php');
deleteAllCookies();

print('<p>You are now logged out.</p>');
header("Refresh: 1;url=index.php");

include('templates/footer.html');
?>