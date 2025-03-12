<?php
    require('../model/Database.php');
    require('../model/userDb.php');

    $notice = " ";
    $error = " ";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        if (!userExists($email)) {
            addUser($username, $email, password_hash($password, PASSWORD_DEFAULT));
            $notice = "User Registered!";
            
        }

        else {
           $error = "This email is already in use!";
        }
    }
}
?>


<?php 
    include('components/header.php'); 
    include('components/nav.php'); 
?>

<div class="container">
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
    <p style="color:green"> <?php echo $notice;?> </p>
    <p style="color:red"> <?php echo $error;?> </p>
</div>
<?php include('components/footer.php'); ?>