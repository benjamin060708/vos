<?php
session_start();

$contents = file_get_contents('desktop.json');
$json = json_decode($contents, true);
if ($json === null) {
    $_SESSION['error'] = 'Blah Blah Boo Error: 39030294';
    header('Location: error.php');
}
$taskbar = $json['taskbar'];

$data = array();
if ($taskbar['location'] === 'top') {
    $data['location'] = 'top: 0;';
} else {
    $data['location'] = 'bottom: 0;';
}

$data['programs'] = '';
foreach ($taskbar['programs'] as $item) {
    $app = $json['apps'][$item];
    if ($app) {
        $data['programs'] = $data['programs'] . '<a href="#" onclick="' . $app['action'] . '()"><img src="' . $app['icon'] . '" alt="' . $app['name'] . '" title="' . $app['name'] . '" width="32" height="32"></a>';
    }
}

function logout() {
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Desktop</title>
<style>
body {
    background-image: url('default.jpg');
    margin: 0;
    padding: 0;
}

#taskbar {
	width: 100%;
    height: 40px;
	background-color: blue;
	position: absolute;
	<?php echo $data['location']; ?>
}
</style>
</head>
<body>
<div id="taskbar"><?php echo $data['programs']; ?></div>
<script>
function handleLogout() {
    if (confirm("Are you sure you want to log out?")) {
        window.location = 'logout.php';
    }
}

function runNotepad() {
    alert("Hi. I'm Notepad.");
}
</script>
</body>
</html>
