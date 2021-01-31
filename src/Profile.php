<?php

require_once './Utils.php';
require_once './Faculty.php';
require_once './Database.php';

session_start();

$user = $_SESSION['user'];
$viewing = $_GET['id'];

if (empty($viewing)) {
    $viewing = $user['id'];
}

$query = "SELECT * FROM users WHERE id=$viewing";
$result = $link->query($query);

if (!$result || mysqli_num_rows($result) == 0) {
    header('HTTP/1.0 404 Not Found');
    exit;
}

$viewing = $result->fetch_assoc();

function getProfilePicturePath($id) {
    $res = glob("./profiles/{$id}.{png, jpg, jpeg}");
    if (!$res) {
        return "./profiles/default.jpg";
    }
    return $res[0];
}

// By default, we display the profile of
// the user viewing the page.

// TODO: 404

if (!isset($viewing)) {
    $viewing = $_SESSION['id'];
}

$onSelfPage = $viewing['id'] == $user['id'];
$profilePicture = getProfilePicturePath($viewing);

?>
<!doctype html>
<html>
<head>
    <meta chars et="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, intial-scale= 1.0">
    <link rel="stylesheet" href="http://localhost/Web/css/profilestyle.css">
    <title>Profile of <?= $viewing['firstname'] ?></title>
    <link rel="shortcut icon" href="images/fav.png">
</head>

<body>
    <div id="content" class="clearfix">
        <div id="userphoto">
            <img src=<?=$profilePicture?> name="profilepicture" alt="profilepicture" width="150" height="150">
        </div>
        <h1>Profile:</h1>
        <nav id="profiletabs">
            <ul class="clearfix">
                <li><a href="#bio" class="sel">Profile</a></li>
                <li><a href="???">Courses</a></li>
            </ul>
        </nav>

        <section id="UserProfile">
            <p><?= $user['firstname'] ?> <?= $viewing['lastname'] ?> </p>
            <p class="UserProfile"><span><?= $viewing['email'] ?></span></p>
            <p class="UserProfile"><span>ID: </span><?= $viewing['id'] ?></p>
            <p class="UserProfile"><span>Faculty: </span> <?= facultyFrom($viewing['faculty']) ?></p>
        </section>
    </div>
    <br>
    <h1>Change profile image</h1>
    <br>
    <form action="./ProfilePicture.php" method="POST" enctype="multipart/form-data">
        <input type="file" id="filename" name="filename">
        <input type="submit">
    </form>
</body>

</html>