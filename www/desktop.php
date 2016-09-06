<?php
session_start();

$contents = file_get_contents('desktop.json');
$json = json_decode($contents, true);
if ($json === null) {
    $_SESSION['error'] = 'Bad JSON data.';
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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Virtual OS</title>

<style>
body {
    background-image: url('default_background.jpg');
    margin:0;
    padding:0;
}
#taskbar {
    width: 100%;
    height: 40px;
    position: absolute;
    <?php echo $data['location']; ?>

    color: white;
    background: #606c88; /* Old browsers */
    background: -moz-linear-gradient(top, #606c88 0%, #3f4c6b 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, #606c88 0%,#3f4c6b 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, #606c88 0%,#3f4c6b 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
}

.app-frame {
    position: absolute;
    resize: both;
}
</style>
</head>

<body>
<div id="taskbar"><?php echo $data['programs']; ?></div>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>

<script>
function handleLogout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location = 'logout.php';
    }
}

function runNotepad() {
    alert("Hi.  I'm Notepad.");
}

function runBrowser() {
    $('<iframe>', {
        src: 'https://www.whizkidzcc.com',
        id: 'notepad-frame',
        class: 'app-frame',
        width: 800,
        height: 600
    }).appendTo('body');
}
</script>
</body>

</html>
