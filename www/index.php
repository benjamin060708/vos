<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['username'] === 'One234' && $_POST['password'] === 'b4n4n45') {
            $_SESSION['user'] = $_POST['username'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Virtual OS</title>
<meta charset="utf-8">
</head>
<body>
<h1>Test</h1>
<p>Session ID = <?php echo session_id();?></p>

<?php
    if (isset($_SESSION['user'])) {
?>
        <p>Logged in!</p>
<?php
    } else {
?>
        <p>Not logged in!</p>
        <form method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" required autofocus>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <button type="submit">Log In</button>
            </div>
        </form>

<?php
    }
?>
</body>
</html>
