<?php

if (isset($_POST["submit"])) {
    $target_dir = "component/img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    // Kiểm tra file upload lên có phải là ảnh không?

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File có định dạng - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Chỉ cho phép hình ảnh.";
        $uploadOk = 0;
    }

    // Kiểm tra file tồn tại hay chưa?
    if (file_exists($target_file)) {
        echo "File đã tồn tại.";
        $uploadOk = 0;
    }
    // Kiểm tra kích thước file 500000 byte
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "File quá lớn.";
        $uploadOk = 0;
    }
    // Kiểm tra định dạng ảnh hợp lệ không?
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Chỉ cho phép các định dạng sau: JPG, JPEG, PNG & GIF";
        $uploadOk = 0;
    }
    // Kiểm tra điều kiện trước khi upload?
    if ($uploadOk == 0) {
        echo "Upload thất bại.";
        // Nếu ok thì cho phép upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo " File " . $target_dir . basename($_FILES["fileToUpload"]["name"]) . " upload thành công.";
            echo '<br/><img src="' . $target_dir . basename($_FILES["fileToUpload"]["name"]) . '" width="160" />';
        } else {
            echo "Upload file thất bại, vui lòng thử lại.";
        }
    }
}
