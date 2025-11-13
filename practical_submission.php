<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "college_erp";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = $_POST['name'];
$roll = $_POST['roll_no'];
$subject = $_POST['subject'];
$topic = $_POST['topic'];

$target_dir = "uploads/";
if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

$file_name = basename($_FILES["practical_file"]["name"]);
$target_file = $target_dir . time() . "_" . $file_name;

if (move_uploaded_file($_FILES["practical_file"]["tmp_name"], $target_file)) {
    $stmt = $conn->prepare("INSERT INTO practical_submissions (name, roll_no, subject, topic, file_path, uploaded_on) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $name, $roll, $subject, $topic, $target_file);
    $stmt->execute();
    echo "<script>alert('Practical uploaded successfully'); window.location.href='practical_submission.html';</script>";
} else {
    echo "Error uploading file.";
}
?>