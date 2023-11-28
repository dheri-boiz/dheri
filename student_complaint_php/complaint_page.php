<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['student_username'])) {
    header('Location: student_login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $complaint_text = $_POST['complaint_text'];
    $student_username = $_SESSION['student_username'];

    // Get student ID   
    $query = "SELECT id FROM students WHERE username = '$student_username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $student_id = $row['id'];

    // Insert complaint into database
    $query = "INSERT INTO complaints (student_id, complaint_text, submission_time) VALUES ($student_id, '$complaint_text', NOW())";
    mysqli_query($conn, $query);
    $success_message = "Complaint submitted successfully!";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Page</title>
</head>
<body>
    <h2>Complaint Page</h2>
    <?php if (isset($success_message)) : ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <form method="post" action="complaint_page.php">
        <label for="complaint_text">Enter your complaint:</label>
        <br>
        <textarea name="complaint_text" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit">Submit Complaint</button>
    </form>
    <br>
    <form method="post" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
