<?php
session_start();

// check user logged in
if (isset($_SESSION['user_id'])) {
    header("Location: basket.php");
    exit;
}

//  database connects
require_once('../private/config.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $enteredUsername = $_POST['Username'];
    $enteredPassword = $_POST['Password'];

    // SQL part: checking if my username is in the table
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$enteredUsername]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // password check
    if ($user && password_verify($enteredPassword, $user['password_hash'])) {
        // session : if succsess
        $_SESSION['user_id'] = $user['id'];

        // Redirect to basket - so customer can continue purchase
        header("Location: basket.php");
        exit;
    } else {
        // Authentication failed so it shows this msg
        $error_message = "Incorrect Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>
    <link rel="stylesheet" href="../private/assets/css/styles.css">
</head>

<body>
    <?php include('../public/templates/header.php'); ?>

    <div class="main-content">
        <h2>Login Account</h2>
        <?php if (isset($error_message)) : ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <label for="Username">Username:</label>
            <input type="text" id="Username" name="Username" required><br><br>

            <label for="Password">Password:</label>
            <input type="password" id="Password" name="Password" required><br><br>

            <input type="submit" name="Submit" value="Sign in">
        </form>

        <p>Don't have an account? <a href="../private/create.php">Create one</a></p>
    </div>

    <img src="../private/pics/noread.png" alt="User Account" class="account-pic">

    <?php include('../public/templates/footer.php'); ?>
  
</body>

</html>
