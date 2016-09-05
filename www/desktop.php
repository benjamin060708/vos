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
    if (isset($item['icon'])) {
        $data['programs'] = $data['programs'] . '<a href="#" onclick="handleLogout()"><img src="' . $item['icon'] . '" alt="' . $item['icon_alt']. '"></a>';
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
</script>
</body>
</html>
