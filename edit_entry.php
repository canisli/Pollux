<?php
include('templates/header.html');
if (isset($_COOKIE['admin'])) {
    if (isset($_GET['name'])) {
        $id = $_GET['id'];
        $name = $_GET['name'];
        print "<h1>Editing Student: $name</h1>";
        $dbc = mysqli_connect('localhost', 'root', '', 'module_5');

        $query = "SELECT * FROM students WHERE id=$id";
        $result = mysqli_fetch_array(mysqli_query($dbc, $query));
        $username = $result['username'];
        $password = $result['password'];
        $g1 = $result['grade1'];
        $g2 = $result['grade2'];
        $g3 = $result['grade3'];
        $g4 = $result['grade4'];
        $g5 = $result['grade5'];
        $g6 = $result['grade6'];
        $g7 = $result['grade7'];
        ?>
        <form action="" method="post">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: <input type="text" name="name" value="<?php echo $name ?>"
                                                                   required><br>
            Username: <input type="text" name="username" value="<?php echo $username ?>"
                             required><br>
            Password: <input type="password" name="password" value="<?php echo $password ?>"
                             required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 1: <input type="number" name="g1" step="0.01" value="<?php echo $g1 ?>"
                                                    required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 2: <input type="number" name="g2" step="0.01" value="<?php echo $g2 ?>"
                                                    required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 3: <input type="number" name="g3" step="0.01" value="<?php echo $g3 ?>"
                                                    required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 4: <input type="number" name="g4" step="0.01" value="<?php echo $g4 ?>"
                                                    required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 5: <input type="number" name="g5" step="0.01" value="<?php echo $g5 ?>"
                                                    required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 6: <input type="number" name="g6" step="0.01" value="<?php echo $g6 ?>"
                                                    required><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Grade 7: <input type="number" name="g7" step="0.01" value="<?php echo $g7 ?>"
                                                    required><br> <br>
            <button type="submit" name="button" formmethod="post">Edit</button>
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
            $query = "UPDATE students SET name='$name', username='$username', password='$password', grade1=$g1, grade2=$g2, grade3=$g3, grade4=$g4, grade5=$g5, grade6=$g6, grade7=$g7 WHERE id=$id";
            mysqli_query($dbc, $query);
            if(mysqli_error($dbc)){
                print '<p class="error">Username already exists.</p>';
            }   else {
                print "<br> Edited $name $username <span class='spoiler'> $password</span> $g1 $g2 $g3 $g4 $g5 $g6 $g7";
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
        ?>
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Name: <input type="text" name="name">
            <input type="submit">
        </form>

        <?php
    }
} else {
    print '<p class="error"> Cookie not valid. Try logging in again.</p>';
    print '<h3><a class="button" href=index.php>Return to login</a></h3>';
}
include('templates/footer.html');
?>

