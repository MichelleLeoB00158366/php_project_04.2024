<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../private/assets/css/styles.css">
</head>

<body>
    <?php include('../public/templates/header.php'); ?>

    <div class="main-content">
        <h2>Create Account</h2>
        <?php
            include(__DIR__ . '/../private/config.php'); // absolute path because otherwise it couldnt conmect from W3
        

        if(isset($_POST['Submit'])) {
            // Retrieve form data
            $username = $_POST['Username'];
            $password = $_POST['Password'];
            $firstName = $_POST['FirstName'];
            $lastName = $_POST['LastName'];
            $phoneNumber = $_POST['PhoneNumber'];

            // password checkpoint charly
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert database part
            $stmt = $pdo->prepare("INSERT INTO users (username, password_hash, firstname, lastname, phone_number) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$username, $hashedPassword, $firstName, $lastName, $phoneNumber]);

            echo '<p class="success">Account created successfully!</p>';
        }
        ?>

        <form action="" method="post">
            <label for="Username">Username:</label>
            <input type="text" id="Username" name="Username" required><br><br>

            <label for="Password">Password:</label>
            <input type="password" id="Password" name="Password" required><br><br>

            <label for="FirstName">First Name:</label>
            <input type="text" id="FirstName" name="FirstName" required><br><br>

            <label for="LastName">Last Name:</label>
            <input type="text" id="LastName" name="LastName" required><br><br>

            <label for="PhoneNumber">Phone Number:</label>
            <input type="text" id="PhoneNumber" name="PhoneNumber" required><br><br>

            <input type="submit" name="Submit" value="Create Account">
        </form>
    </div>

    <img src="../private/pics/noread.png" alt="User Account" class="account-pic">

    <?php include('../public/templates/footer.php'); ?>
  
</body>

</html>
