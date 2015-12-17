<?php
session_start();
include_once 'connect.php';
$delete = $_GET['game'];

$sql = "DELETE FROM games WHERE games.gid = '$delete'";
mysqli_query($conn, $sql);
mysqli_close($conn);
header("Location:admin_games.php");
?>