<?php

function db_connection($config) {
    
    $conn = new mysqli($config["database"]["host_name"], $config["database"]["user_name"], $config["database"]["password"], $config["database"]["db_name"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function get_all_students($config) {

    $conn = db_connection($config);

    return $conn->query("SELECT * FROM students");
}

function login($config) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        return "Please fill in both fields.";
    } 

    $conn = db_connection($config);
    
    $sql = "SELECT * FROM teachers WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $teacher = $result->fetch_assoc();

        if (password_verify($password, $teacher['password'])) {
            $_SESSION['teacher_id'] = $teacher['id'];
            header('Location: ../home.php');

        } 

        return "Invalid username or password.";
    } 
    
    return "No user found with that username.";
}