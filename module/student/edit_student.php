<?php
session_start();
$config = include "../../config/config.php";
include "../../includes/functions.php";

if (!isset($_SESSION['teacher_id'])) {
    header('Location: /auth/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = trim($_POST['id']);
    $field = trim($_POST['field']);
    $value = trim($_POST['value']);

    // Validate input fields
    if (empty($id) || empty($field) || empty($value)) {
        echo "Invalid input.";
        exit();
    }

    if ($field === 'marks' && (!is_numeric($value) || $value < 0)) {
        echo "Marks should be a non-negative number.";
        exit();
    }

    $conn = db_connection($config);

    $sql = "UPDATE students SET $field='$value' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
