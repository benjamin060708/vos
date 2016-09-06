<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Simple Notepad</title>

<style>
#notepad {
    width: 400px;
}
.content-section {
    margin-top: 5px;
    margin-bottom: 5px;
}
#content {
    width: 100%;
    height: 300px;
}
.ctrl-btn {
    width: 26px;
    height: 24px;
}
#bold-btn {
    font-weight: bold;
}
#italic-btn {
    font-style: italic;
}
#underline-btn {
    text-decoration: underline;
}
</style>
</head>

<body onload="loadText()">

<div id=notepad">
    <form name="controls" id="controls">
        <div>
            <select>
                <option selected>Fonts</option>
                <option>Arial Black</option>
            </select>

            <input type="button" id="bold-btn" class="ctrl-btn" value="B" onclick="handleBoldBtn()">

            <input type="button" id="italic-btn" class="ctrl-btn" value="I" onclick="handleItalicBtn()">

            <input type="button" id="underline-btn" value="U" onclick="handleUnderlineBtn()">
        </div>

        <div id="content-section">
            <textarea id="content" rows="9" wrap="virtual" cols=48></textarea>
        </div>

        <div><input type="button" value="Clear" onclick="clearTextArea()"></div>
    </form>
</div>

<script>
function loadText() {
    document.querySelector("content").value = "Text....";
}
function clearTextArea() {

    document.querySelector("content").value = "";
}

function handleBoldBtn() {
    document.querySelector("content").style.font.weight = "bold";
}
function handleItalicBtn() {
    document.querySelector("content").style.font.style = "italic";
}
function handleUnderlineBtn() {
    document.querySelector("content").style.font.decoration = "underline";
}
</script>

</body>
</html>
