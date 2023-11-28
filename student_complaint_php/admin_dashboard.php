<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php');
    exit();
}

// Retrieve all complaints
$query = "SELECT complaints.id, students.username AS student_username, complaint_text, submission_time
          FROM complaints
          INNER JOIN students ON complaints.student_id = students.id
          ORDER BY submission_time DESC";
$result = mysqli_query($conn, $query);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h2>
    <h3>All Complaints</h3>
    <?php if (mysqli_num_rows($result) > 0) : ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Username</th>
                    <th>Complaint Text</th>
                    <th>Submission Time</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['student_username']; ?></td>
                        <td><?php echo $row['complaint_text']; ?></td>
                        <td><?php echo $row['submission_time']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No complaints found.</p>
    <?php endif; ?>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
