
<?php
    require('../model/Database.php');
    require('../model/userDb.php');

    $error = " ";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        if (login($email, $password)) {
            header("Location: studentList.php");
        }

        else {
           $error = "Incorrect email or password.";
        }
    }
}
?>

<?php 
    include('components/header.php'); 
    include('components/nav.php'); 
?>

<div class="container">
    <h2>Login</h2>
    
    <form method="POST">
        <div>
            <label for="email">Email:</label>
            <input id="email" type="email" placeholder="enter email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" placeholder="enter password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <p style="color:red"> <?php echo $error;?> </p>
</div>

<?php include('components/footer.php'); ?>