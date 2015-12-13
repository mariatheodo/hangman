<?php
session_start();
if ($_POST['name'] == 'admin') {
	header("Location: admin.php");
}

else {
	$_SESSION['player'] = $_POST['name'];
	$_SESSION['lives'] = $_POST['level'];
	header("Location: play.php");
}
?>