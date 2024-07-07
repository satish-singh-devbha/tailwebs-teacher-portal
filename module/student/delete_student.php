<?php

session_start();
$config = include "../../config/config.php";
include "../../includes/functions.php";

if (!isset($_SESSION['teacher_id'])) {
    header('Location: /auth/login.php');
    exit();
}

$conn = db_connection($config);
$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Student deleted successfully.";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
