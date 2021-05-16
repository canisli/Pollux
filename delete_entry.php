<?php
include('templates/header.html');
if (isset($_COOKIE['admin'])) {
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        print "<h1>Confirm delete student: $name</h1>";
        $dbc = mysqli_connect('localhost', 'root', '', 'module_4');
        ?>

        <form action="" method="post">
            Are you sure you would like to delete student <?php echo $name ?>? <br><br>
            <button style="background: red;" type="submit" name="button" formmethod="post">DELETE</button>
        </form>

        <center>
            <br>
            <h3><a class="button" href=view_entries.php>Manage Students</a></h3>

        </center>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            $dbc = mysqli_connect('localhost', 'root', '', 'module_5');
            $query = "DELETE FROM students WHERE id=$id";
            mysqli_query($dbc, $query);
            print "<br><br>Deleted student";
            mysqli_close($dbc);
        }

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


