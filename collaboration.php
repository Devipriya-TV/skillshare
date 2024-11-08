<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $skill_name = $_POST['skill_name'];
    $progress = $_POST['progress'];

    $stmt = $pdo->prepare("INSERT INTO collaborations (user_id, skill_name, progress) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $skill_name, $progress]);
}

$stmt = $pdo->prepare("SELECT * FROM collaborations WHERE user_id = ?");
$stmt->execute([$user_id]);
$collaborations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skill Share - Collaboration</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Your Collaborations</h1>
    <form method="POST">
        <input type="text" name="skill_name" placeholder="New Skill" required>
        <input type="number" name="progress" placeholder="Progress" required>
        <button type="submit">Add Skill</button>
    </form>

    <h2>Current Skills</h2>
    <li>
    <?php echo htmlspecialchars($collab['skill_name']); ?>
    <div class="progress-bar">
        <div class="progress-bar-fill" style="width: <?php echo $collab['progress']; ?>%;"></div>
    </div>
    <span><?php echo $collab['progress']; ?>%</span>
</li>

</body>
</html>
