<?php
require_once './Utils.php';
require_once './Database.php';
require_once './Faculty.php';

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

// We need to use the binary comparison
// for case-sensitivity.

$query =
    "SELECT *
    FROM users
    WHERE email='$email'
    AND BINARY password='$password'";

$result = $link->query($query);
$rows = mysqli_num_rows($result);

if ($rows !== 1) {
    echo "Please Check your Password";
    exit;
}

$user = $result->fetch_assoc();
$facultyName = facultyFrom($user['faculty']);


?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, intial-scale= 1.0">
  <title>My Profile</title>
  <link rel="stylesheet" href="../css/profilestyle.css">
  <link rel="shortcut icon" href="../images/fav.png">
</head>

<body>
 
    <div id="content" class="clearfix">
      <div id="userphoto"><img src="../images/avatar.png" alt="default avatar"></div>
      <h1>My Profile</h1>
      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#bio" class="sel">Profile</a></li>
          <li><a href="../selectcourse.html">Courses</a></li>
        </ul>
      </nav>
      
      <section id="UserProfile">

          <p>Name of the user</p>
          
          <p class="UserProfile"><span>E-mail Address </span> user@cloudq.c</p>
          
          <p class="UserProfile"><span>Faculty </span> Computer Science</p>
          
          <p class="UserProfile"><span>Id Number </span>201234</p>
          
          <p class="UserProfile"><span>test</span> test</p>
          
          <p class="UserProfile"><span>test</span> test</p>
      </section>
    </div>
<br>
<h1>Change profile image</h1>
<br>
    <form action="/action_page.php">
      <input type="file" id="myFile" name="filename">
      <input type="submit">
    </form>
 

</body>
</html>
