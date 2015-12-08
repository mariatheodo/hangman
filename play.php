

<?php
//session_start();

//echo $word."<br />";
$lifes = 5;


$len = mb_strlen($word);
$word_array = mb_str_split($word);
$print_word = array();
$print_word[0] = $word_array[0];
for ($i = 1; $i < $len - 1; $i++) {
	$print_word[$i] = "_";
}
$print_word[$len - 1] = $word_array[$len - 1];


for ($i = 0; $i < $len; $i++) {
	echo $print_word[$i]." ";
}
echo "<br />";
$_SESSION['word'] = $word_array;
$_SESSION['print'] = $print_word;
$_SESSION['length'] = $len;

$l = "Α";

?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Δώσε ένα γράμμα:<br>
<input type="text" name="letter">
<br>

<input type="submit" value="Δώσε γράμμα">
</form>



<?php

if (isset($_POST["letter"])) {
	$letter = $_POST["letter"];
	
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
}


function mb_str_split($string) { 

    return preg_split('/(?<!^)(?!$)/u', $string ); 	// σπαω το string σε array χαρακτηρων, δεν δουλεύει η str_split
} 
 
 

?>