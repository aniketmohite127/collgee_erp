<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $roll = $_POST['roll_no'];
    $subject = $_POST['subject'];
    $file = $_FILES['assignment_file'];

    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_path = $upload_dir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        echo "Assignment submitted successfully!";
        // You can also insert into database here
    } else {
        echo "Failed to upload assignment.";
    }
}
?>