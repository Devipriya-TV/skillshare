<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skill Share - Home</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Welcome to Skill Share</h1>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! <a href="collaboration.php">Your Collaborations</a> | <a href="logout.php">Logout</a></p>
    <?php else: ?>
        <p><a href="login.php">Login</a> or <a href="register.php">Register</a> to start collaborating!</p>
    <?php endif; ?>
</body>
</html>
