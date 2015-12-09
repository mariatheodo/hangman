

<?php
session_start();

//echo $word."<br />";
$lifes = 5;

$word = $_SESSION['word'];

$len = mb_strlen($word);
$word_array = mb_str_split($word);
$print_word = array();
$print_word[0] = $word_array[0];
for ($i = 1; $i < $len - 1; $i++) {
	$print_word[$i] = "_";
}
$print_word[$len - 1] = $word_array[$len - 1];



echo "<br />";
//$_SESSION['word'] = $word_array;
//$_SESSION['print'] = $print_word;
//$_SESSION['length'] = $len;
play($print_word, $word_array, $lifes);



function play($print_word, $word_array, $lifes) {
if (in_array('_', $print_word)) {
	for ($i = 0; $i < count($print_word); $i++) {
	echo "<span id='game'>$print_word[$i] </span>";
}
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	Δώσε ένα γράμμα:<br>
	<input type="text" name="letter">
	<br>

	<input type="submit" value="Δώσε γράμμα">
	</form>
<?php }
else {
	die();
} 
if (isset($_POST["letter"]) && (isset($_POST["submit"])) && lifes > 0) {
	$letter = $_POST["letter"];
	
	$keys = array_keys($word_array, $letter);


if (in_array('_', $print_word)) {
	if (count($keys) == 0) {
		echo "Λυπάμαι, το γράμμα που διάλεξες δεν υπάρχει!";
		$lifes--;
	}
	else {
		for ($i=0; $i<count($keys); $i++) {
			$print_word[$keys[$i]] = $letter;
		}
	}
	
play($print_word, $word_array, $lifes);
}}
}?>



<?php
function mb_str_split($string) { 

    return preg_split('/(?<!^)(?!$)/u', $string ); 	// σπαω το string σε array χαρακτηρων, δεν δουλεύει η str_split
} 
?>

