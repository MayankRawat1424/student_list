<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION["student"] = $result->fetch_assoc();
        header("Location: student_info.php");
        exit();
    } else {
        $error = "Student not found. Please check your email or register first.";
    }
}
?>

<h2>Student Login</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    <input type="submit" value="Login">
</form>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<a href="landing_page.html">Back</a>
