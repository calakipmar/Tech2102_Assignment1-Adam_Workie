<?php
    require('../model/Database.php');
    require('../model/studentDb.php');
    require('../model/userDb.php');

// Handle adding a student
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_student'])) {
    $name = $_POST['studentName'];
    $email = $_POST['studentEmail'];
    
    if (!empty($name) && !empty($email)) {
        addStudent($name, $email);
    }
}

// Handle deleting a student
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_student'])) {
    $id = $_POST['studentID'];
    
    if (!empty($id)) {
        deleteStudent($id);
    }
}

// Fetch all students
$students = getStudents();
?>

<?php 
    include('components/header.php'); 
    include('components/nav.php'); 
?>

    <h1>Student Management</h1>

    <h2>Student List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['studentID']; ?></td>
                <td><?php echo $student['studentName']; ?></td>
                <td><?php echo $student['studentEmail']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Student</h2>
    <form method="post">
        <label for="studentName">Name:</label>
        <input type="text" id="studentName" name="studentName" required>
        
        <label for="studentEmail">Email:</label>
        <input type="email" id="studentEmail" name="studentEmail" required>
        
        <button type="submit" name="add_student">Add Student</button>
    </form>

    <h2>Delete Student</h2>
    <form method="post">
        <label for="studentID">Student ID:</label>
        <input type="number" id="studentID" name="studentID" required>
        
        <button type="submit" name="delete_student">Delete Student</button>
    </form>

<?php include('components/footer.php'); ?>