<?php
    require('../model/Database.php');
    require('../model/userDb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        if (userExists($email)) {

            echo "User Registered!";
            
        }

        else {
           echo "This email is already in use!";
        }
    }
}
?>


<?php 
    include('components/header.php'); 
    include('components/nav.php'); 
?>


<h2>Create an Account</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Register</button>
    </form>

<?php include('components/footer.php'); ?>