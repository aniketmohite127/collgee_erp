<?php
$conn = new mysqli("localhost", "root", "", "college_erp");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM practical_submissions ORDER BY uploaded_on DESC");

echo "<table border='1' width='100%' cellpadding='5'>";
echo "<tr><th>Name</th><th>Roll No</th><th>Subject</th><th>Topic</th><th>File</th><th>Date</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['name']}</td>
        <td>{$row['roll_no']}</td>
        <td>{$row['subject']}</td>
        <td>{$row['topic']}</td>
        <td><a href='{$row['file_path']}' target='_blank'>View</a></td>
        <td>{$row['uploaded_on']}</td>
    </tr>";
}
echo "</table>";
?>