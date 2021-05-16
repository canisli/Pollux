<?php
include('templates/header.html');
include('functions.php');
if (studentLoggedIn()) {
    $username = getUsername();
    $dbc = mysqli_connect('localhost', 'root', '', 'module_5');
    $query = "SELECT * FROM students WHERE username='$username'";
    $result = mysqli_fetch_array(mysqli_query($dbc, $query));
    $name = $result['name'];
    $g1 = $result['grade1'];
    $g2 = $result['grade2'];
    $g3 = $result['grade3'];
    $g4 = $result['grade4'];
    $g5 = $result['grade5'];
    $g6 = $result['grade6'];
    $g7 = $result['grade7'];
    print "
        <h3>Grades for $name</h3>
        Course 1: $g1 <br>
        Course 2: $g2 <br>
        Course 3: $g3 <br>
        Course 4: $g4 <br>
        Course 5: $g5 <br>
        Course 6: $g6 <br>
        Course 7: $g7
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