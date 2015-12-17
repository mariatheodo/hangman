<?php

include_once 'connect.php';
$delete = $_GET['word'];

$sql = "DELETE FROM words WHERE word.wid = '$delete'";
mysqli_query($conn, $sql);
mysqli_close($conn);
header("Location:admin_words.php");
?>