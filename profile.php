<?php
include('templates/header.html');
include('functions.php');
if (isset($_COOKIE['admin'])) {
    ?>
    <h3>Profile</h3>
    Name: admin <br>
    Username: admin <br>
    Password: <span class='spoiler'>pollux123</span> <br><br>
    <center>
        <br>
        <h3><a class="button" href=admin_panel.php>Home</a></h3>
    </center>
    <?php
} else if (studentLoggedIn()) {
    $username = getUsername();
    $dbc = mysqli_connect('localhost', 'root', '', 'module_5');
    $query = "SELECT * FROM students WHERE username='$username'";
    $result = mysqli_fetch_array(mysqli_query($dbc, $query));
    $name = $result['name'];
    $password = $result['password'];
    print "
        <h3>Profile</h3>
        Name: $name <br>
        Username: $username <br>
        Password: <span class='spoiler'>$password</span> <br><br>
        <center>
            <br>
            <h3><a class=\"button\" href=student_panel.php>Home</a></h3>
        </center>
    ";
} else {
    print '<p class="error"> Cookie not valid. Try logging in again.</p>';
    print '<h3><a class="button" href=index.php>Return to login</a></h3>';
}
?>