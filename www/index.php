<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['username'] === 'steven' && $_POST['password'] === 'whizkidz') {
            $_SESSION['user'] = $_POST['username'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Virtual OS</title>
</head>

<body>
<p>Hello world!</p>
<p>Session id = <?php echo session_id(); ?></p>

<?php
    if (isset($_SESSION['user'])) {
        header('Location: desktop.php');
    } else {
?>
        <p>Not logged in.</p>

        <form method="post">
            <div>
                <label for="username">Username: </label>
                <input type="text" name="username" required autofocus>
            </div>
            <div>
                <label for="password">Password: </label>
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
