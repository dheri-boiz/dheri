<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect('localhost', 'root', '2205', 'limitusers');

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $user_id = $row['id'];

            // Check if the user has exceeded the maximum allowed sessions
            $max_sessions = 3;

            $session_count_sql = "SELECT COUNT(id) AS session_count FROM active_sessions WHERE user_id = $user_id";
            $session_count_result = mysqli_query($conn, $session_count_sql);

            if ($session_count_result) {
                $session_count_row = mysqli_fetch_assoc($session_count_result);
                $current_sessions = $session_count_row['session_count'];

                if ($current_sessions < $max_sessions) {
                    $_SESSION['user_id'] = $user_id;
                    $session_id = session_id();

                    // Store the active session in the database
                    $insert_session_sql = "INSERT INTO active_sessions (user_id, session_id) VALUES ($user_id, '$session_id')";
                    mysqli_query($conn, $insert_session_sql);

                    $session_cookie_params = session_get_cookie_params();
                    setcookie(session_name(), session_id(), time() + 3600, $session_cookie_params['path'], $session_cookie_params['domain'], false, true);

                    header("Location: dashboard.php");
                } else {
                    echo "Maximum concurrent sessions reached. Please log out from another device.";
                }
            } else {
                echo "Error: " . $session_count_sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Invalid username or password. <a href='login.php'>Try again</a>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
