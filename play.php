

<?php
session_start();
?>

<html>

<body>
<?php
if (!isset($_SESSION['word'])) {											//αν ξεκινάει session διαλέγει λέξη
	include_once 'connect.php';
	include_once 'choose_word.php';
	$_SESSION['lives'] = 5;
	//$word = $_SESSION['word'];

	$len = mb_strlen($word);											
	$_SESSION['word_array'] = mb_str_split($word);							//μετατροπή σε πίνακα
	$print_word = array();
	$print_word[0] = $_SESSION['word_array'][0];
	for ($i = 1; $i < $len - 1; $i++) {
		$print_word[$i] = "_";
	}
	$print_word[$len - 1] = $_SESSION['word_array'][$len - 1];
	$_SESSION['print_word'] = $print_word;
}

echo "<br />";

if (isset($_POST['letter'])) {												//έλεγχος γράμματος
	if (in_array($_POST['letter'], $_SESSION['word_array']) === FALSE) {
		--$_SESSION['lives'];
		echo "<p> Λυπάμαι, το γράμμα που διάλεξες δεν υπάρχει στη λέξη</p>";
	}
	$letter = $_POST["letter"];
}
else {
	$letter = '';
}

if ($_SESSION['lives'] == 0) {												//τελειώνουν οι προσπάθειες
	echo "<p> Οι προσπάθειές σου τελείωσαν. Έπαιζες με τη λέξη ".$_SESSION['word']."</p>";
	echo "<p> <a href='play.php'>Θέλεις να ξαναπαίξεις;</p>";
	unset($_SESSION['word']);
}
else {
			
	$keys = array_keys($_SESSION['word_array'], $letter);					//το γράμμα υπάρχει στη λέξη
	
	for ($i=0; $i < count($keys); $i++) {
		$_SESSION['print_word'][$keys[$i]] = $letter;
	}
	for ($i = 0; $i < count($_SESSION['print_word']); $i++) {
		echo "<span id='game'>".$_SESSION['print_word'][$i]." </span>";
	}
	
	if (!in_array('_', $_SESSION['print_word'])) {							//η λέξη συμπληρώθηκε
		echo "\n\n" . '  <p><a href="play.php">Μπράβο! Θέλεις να παίξεις ξανά?</a></p>';
		unset($_SESSION['word']);
	}
}

function mb_str_split($string) { 

    return preg_split('/(?<!^)(?!$)/u', $string ); 							// σπαω το string σε array χαρακτηρων, δεν δουλεύει η str_split
} 
?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	Δώσε ένα γράμμα:<br>
	<input type="text" name="letter">
	<br>

	<input type="submit" value="Δώσε γράμμα">
	</form>

</body>
</html>