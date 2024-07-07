<?php
session_start();

$config = include "config/config.php";
include "includes/functions.php";

if (!isset($_SESSION['teacher_id'])) {
    header('Location: login.php');
    exit();
}

$result = get_all_students($config);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script src="js/index.js" defer></script>
</head>
<body>

    <header class="header">
        <div class="">
            <h2>Tailwebs</h2>
        </div>
        
        <div>
            <a href="home.php" class="logout-button">Home</a>
            <a href="/auth/logout.php" class="logout-button">Logout</a>
        </div>
    </header>

    <div class="container">
        <section class="student-listing">
            
        <div class="student-header">
                <h3>Student List</h3>
                <button onclick="showAddStudentModal()" class="add-button">Add Student</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Marks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td contenteditable="true" data-original-text="<?php echo htmlspecialchars($row['name']); ?>" onBlur="updateStudent(<?php echo $row['id']; ?>, 'name', this)"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td contenteditable="true" data-original-text="<?php echo htmlspecialchars($row['subject']); ?>" onBlur="updateStudent(<?php echo $row['id']; ?>, 'subject', this)"><?php echo htmlspecialchars($row['subject']); ?></td>
                        <td contenteditable="true" data-original-text="<?php echo htmlspecialchars($row['marks']); ?>" onBlur="updateStudent(<?php echo $row['id']; ?>, 'marks', this)"><?php echo htmlspecialchars($row['marks']); ?></td>
                        <td>
                            <button onclick="deleteStudent(<?php echo $row['id']; ?>)" class="delete-button">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>

    <!-- Add Student Modal -->
    <div id="addStudentModal" class="modal">
        <div class="modal-content">
            
            <div class="modal-header">
                <h3>Add Student</h3>
                <button onclick="hideAddStudentModal()" class="close-button">X</button>
            </div>
            <form id="addStudentForm">
                <div class="input-group">
                    <!-- <label for="name">Name</label> -->
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="input-group">
                    <!-- <label for="subject">Subject</label> -->
                    <input type="text" id="subject" name="subject" placeholder="Subject" required>
                </div>
                <div class="input-group">
                    <!-- <label for="marks">Marks</label> -->
                    <input type="number" id="marks" name="marks" placeholder="Marks" required>
                </div>

                <div class="" style="text-align: center;">
                    <button type="submit" class="add-button-btn">Submit</button>
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>
