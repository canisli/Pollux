<?php
include('templates/header.html');
if (isset($_COOKIE['admin'])) {
    ?>
    <h1>Add Entry</h1>
    <form action="" method="post">
        <center>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: <input type="text" name="name" required><br>
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 1: <input type="number" name="g1" step="0.01" value=0 required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 2: <input type="number" name="g2" step="0.01" value=0 required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 3: <input type="number" name="g3" step="0.01" value=0 required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 4: <input type="number" name="g4" step="0.01" value=0 required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 5: <input type="number" name="g5" step="0.01" value=0 required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 6: <input type="number" name="g6" step="0.01" value=0 required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 7: <input type="number" name="g7" step="0.01" value=0 required><br><br>
            <button type="submit" name="button" formmethod="post">Add</button>
        </center>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $g1 = $_POST['g1'];
        $g2 = $_POST['g2'];
        $g3 = $_POST['g3'];
        $g4 = $_POST['g4'];
        $g5 = $_POST['g5'];
        $g6 = $_POST['g6'];
        $g7 = $_POST['g7'];


        $name = trim(strip_tags($name));
        $dbc = mysqli_connect('localhost', 'root', '', 'module_5');
        $query = "INSERT INTO students (id, name, username, password, grade1, grade2, grade3, grade4, grade5, grade6, grade7) VALUES(0, '$name', '$username', '$password', '$g1', '$g2', '$g3', '$g4', '$g5', '$g6', '$g7')";
        mysqli_query($dbc, $query);
        if(mysqli_error($dbc)){
            print '<p class="error">Username already exists.</p>';
        }   else {
            print "<br>Submitted $name $username <span class='spoiler'> $password</span> $g1 $g2 $g3 $g4 $g5 $g6 $g7";
            mysqli_close($dbc);
        }
    }
    ?>
    <center>
        <br>
        <h3><a class="button" href=view_entries.php>Manage Students</a></h3>
    </center>
    <?php
} else {
    print '<p class="error"> Cookie not valid. Try logging in again.</p>';
    print '<h3><a class="button" href=index.php>Return to login</a></h3>';
}
include('templates/footer.html');
?>


