<?php

require_once './Profile.php';

function setProfilePicture() {
    $id = $_SESSION['user']['id'];
    $file = $_FILES['filename'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

    if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
        echo "Invalid File Type: $ext";
        return;
    }

    $res = glob("profiles/{$id}.{png, jpg, jpeg}");
    $dir = "profiles/{$id}.{$ext}";
    if (!$res) {
        move_uploaded_file($file['tmp_name'], $dir);
        return;
    }

    unlink($res[0]);
    move_uploaded_file($file['tmp_name'], $dir);
}

if (isset($_POST) && isset($_FILES)) {
    setProfilePicture();
}