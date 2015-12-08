<?php
session_start();
$word_array = $_SESSION["word"];
$len = $_SESSION["length"];
$letter = $_POST["letter"];
$print_word = $_SESSION["print"];

$keys = array_keys($word_array, $letter);


if (in_array('_', $print_word)) {
	if (count($keys) == 0) {
		echo "Λυπάμαι, το γράμμα που διάλεξες δεν υπάρχει!";
	}
	else {
		for ($i=0; $i<count($keys); $i++) {
			$print_word[$keys[$i]] = $letter;
		}
	}
}
for ($i = 0; $i < $len; $i++) {
	echo $print_word[$i]." ";
	}
	
header("Location: play.php");
exit();



?>