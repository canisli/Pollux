<?php
include('templates/header.html');
if (isset($_COOKIE['admin'])) {
    $dbc = mysqli_connect('localhost', 'root', '', 'module_5');
    $query = 'SELECT * FROM students';
    print '<h2>Manage Students</h2>';
    print "<hr>";
    print '<h3><a class="button" href=add_entry.php>Add Student</a>&nbsp;&nbsp;&nbsp;&nbsp;';
    print '<a class="button" href=admin_panel.php>Home</a>&nbsp;&nbsp;&nbsp;&nbsp;';
    print '<a style="background:red" class="button" href=delete_all.php>Delete All</a></h3>';
    if ($r = mysqli_query($dbc, $query)) {
        print"<hr>";
        while ($row = mysqli_fetch_array($r)) {
            $grades = '';
            for ($i = 1; $i <= 7; $i++) {
                $grades = $grades . 'Course ' . $i . ': ' . $row['grade' . $i] . '<br>';
            }
            print "<p><h3>{$row['name']}</h3>
            Username: {$row['username']} <br> 
            Password: <span class='spoiler'> {$row['password']} </span><br>
            $grades
        <br> <br>
        <a class=\"smallbutton\"href=\"edit_entry.php?name={$row['name']}&id={$row['id']}\">Edit</a>
        <a class=\"smallbutton\" style='background:red;' href=\"delete_entry.php?name={$row['name']}&id={$row['id']}\">Delete</a>
        </p><hr>\n";
        }
    }
    mysqli_close($dbc);

} else {
    print '<p class="error"> Cookie not valid. Try logging in again.</p>';
    print '<h3><a class="button" href=index.php>Return to login</a></h3>';
}
?>