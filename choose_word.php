<?php

$sql = "SELECT word FROM words;";							//βρίσκω όλες τις λέξεις 
$result = mysqli_query($conn, $sql);
$words = array();
while ($row = mysqli_fetch_assoc($result)) {
	$words[] = $row["word"];
}

mysqli_close($conn);
$size = count($words);
$wid = mt_rand(0, $size - 1);								//διαλέγω τυχαία λέξη
$word = $words[$wid];	

$_SESSION['word'] = $word;

?>
