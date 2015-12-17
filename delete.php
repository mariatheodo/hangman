<?php
include_once 'connect.php';
$delete = $_GET['delete'];
$sql = "DELETE FROM games WHERE games.gid = $delete";
$result = mysqli_query($conn, $sql);
header("Location: admin_games.php");
?>