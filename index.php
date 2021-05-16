<?php
include('functions.php');
include('templates/header.html');
// don't show login screen if your already logged in
if (isset($_COOKIE['admin'])) {
    header("Location: admin_panel.php");
}
if(studentLoggedIn()){
    header("Location: student_panel.php");
}

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $query = "CREATE DATABASE module_5";
    $conn->query($query);
    $conn->close();
    $dbc = mysqli_connect('localhost', 'root', '', 'module_5');
    $query = "CREATE TABLE students (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(100) NOT NULL,
        username VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(100) NOT NULL,
        grade1 decimal,
        grade2 decimal,
        grade3 decimal,
        grade4 decimal,
        grade5 decimal,
        grade6 decimal,
        grade7 decimal
        ) CHARACTER SET utf8";
    mysqli_query($dbc, $query);

    ?>
    <br><br><br>
    <form action="login.php" method="post">
        <div class="container">
            <img class="logo" src="https://i.ibb.co/7tdqHX5/gemini.png" width="100" height="100" alt="gemini"
                 border="0">
            <div class="content">
                <h2>Student/Teacher Login</h2>
                <input type="text" placeholder="Username" name="username" required> <br><br>
                <input type="password" placeholder="Password" name="password" required> <br> <br>

                <button type="submit">Login</button>
            </div>
        </div>
    </form>
    <?php
}
include('templates/footer.html');
?>