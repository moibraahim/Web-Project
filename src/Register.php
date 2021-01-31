<?php
require_once './Utils.php';
require_once './Database.php';

$firstname = $_POST['fname'];
$lastname  = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$faculty = intval($_POST['faculty']);

// Check if a user with the same email already exists
// in the database.

$query =
    "SELECT *
    FROM users
    WHERE email='$email'";

$result = $link->query($query);
// 
if ($result->num_rows > 0) {
    echo "This email is already used in an account. Perhaps you meant to login instead?";
    return;
}

$query =
    "INSERT INTO 
        users (firstname, lastname, email, password, faculty)
    VALUES (
        '$firstname',
        '$lastname',
        '$email',
        '$password',
        $faculty
    )";

$result = $link->query($query);

// Redirect to the login page.

redirect("../login.html");
exit;