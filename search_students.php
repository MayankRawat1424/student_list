<?php
include "db.php";

$searchCourse = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchCourse = $_POST["course"];
    $stmt = $conn->prepare("SELECT * FROM students WHERE course LIKE ?");
    $like = "%$searchCourse%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2>Search Results</h2><a href='landing_page.html'>Back</a><br><br>";
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
}
?>

<form method="POST">
    <h2>Search Students by Course</h2>
    Course: <input type="text" name="course" required>
    <input type="submit" value="Search">
</form>
