<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Internal Error</title>
</head>

<body>
<p><?php echo $_SESSION['error']; ?></p>
</body>

</html>
