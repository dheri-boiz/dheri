<?php
session_start();
session_unset();
session_destroy();
header('Location: index.php'); // Replace with the appropriate landing page
exit();
?>
