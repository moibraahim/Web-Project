<form method="post" enctype="multipart/form-data">
    Select a video to upload:
    <input type="file" name="video" id="video">
    <input type="submit" value="Upload Video" name="submit">
</form>

<?php

require_once 'src/Database.php';

$file     = $_FILES['video'];
$courseid = $_POST['course'];

if ($file['type'] !== 'mp4') {
    echo "File is not a video.";
    return;
}

// Intese
$query = 
    "INSERT INTO

    VALUES
        ()
    ";

$result = $link->query($query);

if ($result) {
    //...
}

$path = "videos/{$facultyid}/{$courseid}/{$videoid}";
// check if directory has not been created

$result = move_uploaded_file($file['tmp_name'], $path);

if (!$result) {
    echo "File could not be uploaded!";
    return;
}
