<?php

// γίνεται επιλογή λέξης από τη βάση με τυχαίο τρόπο

$sql = "SELECT word FROM words;";							//βρίσκει όλες τις λέξεις 
$result = mysqli_query($conn, $sql);
$words = array();
while ($row = mysqli_fetch_assoc($result)) {
	$words[] = $row["word"];
}

mysqli_close($conn);
$size = count($words);
$wid = mt_rand(0, $size - 1);								//διαλέγει τυχαία λέξη κάθε φορά
$word = $words[$wid];	

$_SESSION['word'] = $word;

?>
