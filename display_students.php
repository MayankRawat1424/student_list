<?php
include "db.php";

$result = $conn->query("SELECT * FROM students ORDER BY created_at DESC");

echo "<h2>All Students</h2><a href='landing_page.html'>Back</a><br><br>";
echo "<table border='1' cellpadding='10'>
<tr><th>ID</th><th>Name</th><th>Email</th><th>Course</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['email']}</td>
    <td>{$row['course']}</td>
    </tr>";
}

echo "</table>";
?>
