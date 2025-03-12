<?php
    session_start();
    require('../model/Database.php');
    require('../model/studentDb.php');

    $noticeDel = " ";
    $errorDel = " ";

    $students = getStudents();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_student'])) {
        $name = $_POST['studentName'];
        $email = $_POST['studentEmail'];
        
        if (!empty($name) && !empty($email)) {
            addStudent($name, $email);
            $_SESSION['noticeDel'] = "Student '$name' has been added.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_student'])) {
        $id = $_POST['studentID'];
        
        if (!empty($id)) {
            if(studentExists($id)) {
                deleteStudent($id);
                $_SESSION['noticeDel'] = "Student with the ID '$id' has been removed.";
            } else {
                $_SESSION['errorDel'] = "There is no student with the ID '$id'.";
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
?>

<?php 
    include('components/header.php'); 
    include('components/nav.php'); 
?>

<h1>Student Management</h1>



<div class="container">
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
    
        
        <form method="post">
            <h2>Add Student</h2>
        <div>
            <label for="studentName">Name:</label>
            <input type="text" id="studentName" name="studentName" required>
        </div>
        <div>
            <label for="studentEmail">Email:</label>
            <input type="email" id="studentEmail" name="studentEmail" required>
        </div>
            <button type="submit" name="add_student">Add Student</button>
        </form>
       
        <form method="post">    
            <h2>Delete Student</h2>
            <label for="studentID">Student ID:</label>
        <div class="delete">
            <input type="number" id="studentID" name="studentID" required>
            <button type="submit" name="delete_student">Delete Student</button>
        </div>
            
        </form>
        
        <?php
            if (isset($_SESSION['noticeDel'])) {
                echo "<p style='color: green;'>" . $_SESSION['noticeDel'] . "</p>";
                unset($_SESSION['noticeDel']);
            }

            if (isset($_SESSION['errorDel'])) {
                echo "<p style='color: red;'>" . $_SESSION['errorDel'] . "</p>";
                unset($_SESSION['errorDel']);
            }
        ?>

    </div>
<?php include('components/footer.php'); ?>