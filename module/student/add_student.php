<?php
session_start();
$config = include "../../config/config.php";
include "../../includes/functions.php";

if (!isset($_SESSION['teacher_id'])) {
    header('Location: /auth/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $subject = trim($_POST['subject']);
    $marks = trim($_POST['marks']);


     // Validate input fields
     if (empty($name) || empty($subject) || empty($marks)) {
        echo "All fields are required.";
        exit();
    }

    if (!is_numeric($marks) || $marks < 0) {
        echo "Marks should be a non-negative number.";
        exit();
    }

    $conn = db_connection($config);

    $sql = "SELECT * FROM students WHERE name='$name' AND subject='$subject'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $newMarks = $student['marks'] + $marks;
        $updateSql = "UPDATE students SET marks='$newMarks' WHERE id=".$student['id'];
        if ($conn->query($updateSql) === TRUE) {
            echo "Student marks updated successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        $insertSql = "INSERT INTO students (name, subject, marks) VALUES ('$name', '$subject', '$marks')";
        if ($conn->query($insertSql) === TRUE) {
            echo "New student added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
