<?php
include('templates/header.html');
include('functions.php');

$admin = false;
$student = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        if ((strtolower($_POST['username']) == 'admin') && ($_POST['password'] == 'pollux123')) {
            deleteAllCookies();
            setcookie('admin', 'admin', time()+3600);
            $admin = true;
        } else {
            $dbc = mysqli_connect('localhost', 'root', '', 'module_5');
            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM students WHERE username='$username'";
            $result = mysqli_fetch_array(mysqli_query($dbc, $query));
            if (empty($result)) {
                $error = 'Username is wrong';
            } else {
                if ($password == $result['password']) {
                    deleteAllCookies();
                    setcookie("$username", 'student', time()+3600);
                    $student = true;
                } else {
                    $error = 'Password is wrong';
                }
            }


        }

    } else {
        $error = 'Please enter both a username and password!';
    }

}

if ($error) {
    print '<p class="error">' . $error . '</p>';
}

if ($admin) {
    print '<p>You are now logged in!</p>';
    header("Refresh: 1;url=admin_panel.php");
} else if ($student) {
    print '<p>You are now logged in!</p>';
    header("Refresh: 1;url=student_panel.php");
} else {
    header("Refresh: 3;url=index.php");
    print('(Redirecting in 3 seconds)');
}

include('templates/footer.html');
