<?php
session_start();

if (!isset($_SESSION["student"])) {
    header("Location: login.php");
    exit();
}

$student = $_SESSION["student"];
?>

<h2>Welcome, <?php echo htmlspecialchars($student["name"]); ?>!</h2>
<p><strong>Email:</strong> <?php echo htmlspecialchars($student["email"]); ?></p>
<p><strong>Course:</strong> <?php echo htmlspecialchars($student["course"]); ?></p>

<a href="logout.php">Logout</a> | <a href="landing_page.html">Home</a>
