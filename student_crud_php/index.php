<?php

// Database connection
$conn = mysqli_connect('localhost', 'root', '2205', 'crud_example');

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Add a new student
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (name, age) VALUES ('$name', $age)";

    if (mysqli_query($conn, $sql)) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Update student information
if (isset($_POST['update'])) {
    $update_id = $_POST['update_id'];
    $new_name = $_POST['new_name'];
    $new_age = $_POST['new_age'];
    
    $sql = "UPDATE students SET name='$new_name', age=$new_age WHERE id=$update_id";

    if (mysqli_query($conn, $sql)) {
        echo "Student information updated successfully";
    } else {
        echo "Error updating student information: " . mysqli_error($conn);
    }
}

// Delete a student
if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];

    $sql = "DELETE FROM students WHERE id = $delete_id";

    if (mysqli_query($conn, $sql)) {
        echo "Student deleted successfully";
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Example</title>
</head>
<body>
    <h2>Student Information</h2>
    <form action="index.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <br>
        <label for="age">Age:</label>
        <input type="number" name="age" required>
        <br><br>
        <button type="submit" name="add">Add</button>
    </form>

    <h2>Student List</h2>
    <ul>
        <?php
        // List students
        $result = mysqli_query($conn, "SELECT * FROM students");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['name']} ({$row['age']} years old) - ID: {$row['id']}</li>";
        }
        ?>
    </ul>

    <h2>Update Student Information</h2>
    <form action="index.php" method="post">
        <label for="update_id">Student ID to Update:</label>
        <input type="number" name="update_id" required>
        <br>
        <label for="new_name">New Name:</label>
        <input type="text" name="new_name" required>
        <br>
        <label for="new_age">New Age:</label>
        <input type="number" name="new_age" required>
        <br>
        <button type="submit" name="update">Update</button>
    </form>

    <h2>Delete Student</h2>
    <form action="index.php" method="post">
        <label for="delete_id">Student ID to Delete:</label>
        <input type="number" name="delete_id" required>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
