<?php
include('templates/header.html');
include('functions.php');
if (isset($_COOKIE['admin'])) {
    ?>
    <h2>Tutorial</h2>
    <div style="text-align: left"><h3>Managing students</h3>
    To add a student, go to MANAGE STUDENTS and select ADD STUDENT. Usernames must be unique. <br>
    Students will then be able to login with the assigned username and password to view their grades.
    Hover over the password spoiler to view the password.
    </div>
    <center>
        <br>
        <h3><a class="button" href=admin_panel.php>Home</a></h3>
    </center>
    <?php
} else if(studentLoggedIn()){
    ?>
    <h2>Tutorial</h2>
    <div style="text-align: left"><h3>Viewing information</h3>
        View your login information through the VIEW PROFILE button. View your grades through the VIEW GRADES button. To change your password, contact your teacher.
    </div>
    <center>
        <br>
        <h3><a class="button" href=student_panel.php>Home</a></h3>
    </center>
    <?php
} else {
    print '<p class="error"> Cookie not valid. Try logging in again.</p>';
    print '<h3><a class="button" href=index.php>Return to login</a></h3>';
}
include('templates/footer.html');
?>


