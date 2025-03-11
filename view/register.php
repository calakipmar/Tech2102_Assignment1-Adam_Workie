<?php
    require('../model/Database.php');
    require('../model/userDb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        if (!userExists($email)) {
            addUser($username, $email, password_hash($password, PASSWORD_DEFAULT));
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

<div class="register">
    <h2>Create an Account</h2>

    
    <form method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Register</button>
    </form>
</div>
<?php include('components/footer.php'); ?>