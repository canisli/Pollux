<?php
include('templates/header.html');
include('functions.php');

if(studentLoggedIn()){
?>
    <div class="container">
        <h2>Actions</h2>
        <center>
            <h3><a class="button" href=profile.php>View Profile</a></h3>
            <h3><a class="button" href=grades.php>View Grades</a></h3>
            <h3><a class="button" href=tutorial.php>View Tutorial</a></h3>
        </center>
    </div>

    <center><h3><a style="background: red; width: 75px" class="button" href=logout.php>Log Out</a></h3></center>
<?php
} else {
    print '<p class="error"> Cookie not valid. Try logging in again.</p>';
    print '<h3><a class="button" href=index.php>Return to login</a></h3>';
}
include('templates/footer.html');
?>