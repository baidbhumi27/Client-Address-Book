<?php
function upload_image($image){

    $target_dir = "images/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($image["tmp_name"]);
    if ($check !== false) {

        $uploadOk = 1;
    } else {
        echo "<p class='alert alert-danger'>File is not an image.</p>";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "<p class='alert alert-danger'>Sorry, file already exists.</p>";
        $uploadOk = 0;
    }
    if ($image["size"] > 500000) {
        echo "<p class='alert alert-danger'>Sorry, your file is too large.</p>";
        $uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "<p class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "<p class='alert alert-danger'>Sorry, your file was not uploaded.</p>";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            echo "<p class='alert alert-success'>The file " . basename($image["name"]) . " has been uploaded.</p>";
            return($image['name']);
        } else {
            echo "<p class='alert alert-danger'>Sorry, there was an error uploading your file.</p>";
        }
    }

}

?>