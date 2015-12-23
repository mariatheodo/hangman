<?php
session_start();
include_once 'header.html';

echo "<h2>Καλωσήρθες ".$_SESSION['player']."</h2>";


if (!isset($_SESSION['word'])) {											//αν τώρα ξεκινάει session διαλέγει λέξη
	include_once 'connect.php';
	include_once 'choose_word.php';

	$_SESSION['tries_left'] = $_SESSION['lives'];
	
	$len = mb_strlen($word);											
	$_SESSION['word_array'] = mb_str_split($word);							//μετατροπή σε πίνακα
	$print_word = array();
	$print_word[0] = $_SESSION['word_array'][0];
	for ($i = 1; $i < $len - 1; $i++) {
		$print_word[$i] = "_";
	}
	$print_word[$len - 1] = $_SESSION['word_array'][$len - 1];
	$_SESSION['print_word'] = $print_word;
	$_SESSION['used'] = array();
}

//echo "<br />";

if (isset($_POST['letter'])) {												//έλεγχος γράμματος
	$_SESSION['used'][] = $_POST['letter'];
	if (in_array($_POST['letter'], $_SESSION['word_array']) === FALSE) {
		--$_SESSION['tries_left'];
		echo "<h4> Λυπάμαι, το γράμμα που διάλεξες δεν υπάρχει στη λέξη</h4>";
	}
	else {
		echo "<h4><br /></h4>";
	}
	$letter = $_POST["letter"];
}
else {
	$letter = '';
}

if ($_SESSION['tries_left'] <= 0) {												
	echo "<h4> Οι προσπάθειές σου τελείωσαν. Έπαιζες με τη λέξη ".$_SESSION['word']."</h4>";
	
	echo "<br />";
	echo "<br />";
	play_again();

	
	

}
else {
	echo "<h4>Έχεις ".$_SESSION['tries_left']." προσπάθειες.";
	if (isset($_POST['letter'])) {
	echo "Έχεις χρησιμοποιήσει ήδη τα γράμματα: ";
	foreach ($_SESSION['used'] as $v) {
		echo $v.", ";
	}
	}
	echo "</h4> <br />";		
	$keys = array_keys($_SESSION['word_array'], $letter);					//το γράμμα υπάρχει στη λέξη
	
	for ($i=0; $i < count($keys); $i++) {
		$_SESSION['print_word'][$keys[$i]] = $letter;
	}
	echo "<h4>";
	for ($i = 0; $i < count($_SESSION['print_word']); $i++) {
		echo "<span class='game'>".$_SESSION['print_word'][$i]." </span>";
	}

	if (!in_array('_', $_SESSION['print_word'])) {							//η λέξη συμπληρώθηκε
		switch ($_SESSION['lives']) {
			case '10':
				$points = 20 + $_SESSION['tries_left'] * 10;
				break;
			case '7':
				$points = 50 + $_SESSION['tries_left'] * 15;
				break;
			case '5':
				$points = 80 + $_SESSION['tries_left'] * 20;
				break;
		}
		$_SESSION['points'] += $points;
		echo "<br />";
		echo "<br />";
		play_again();
	}
	echo "</h4>";
}

function mb_str_split($string) { 

    return preg_split('/(?<!^)(?!$)/u', $string ); 							//σπαω το string σε array χαρακτηρων, δεν δουλεύει η str_split
} 

function play_again() {
	echo '<div class="col-sm-6">Έχεις συγκεντρώσει '.$_SESSION['points'].' πόντους</div>
		<div class="col-sm-6">Θέλεις να ξαναπαίξεις;</div><br />';
	echo '<a href="new_game.php?new=true"><button class="btn-sm">ΝΑΙ</button></a>';
	echo '<a href="new_game.php?new=false"><button class="btn-sm">OXI</button></a>';
}
?>
	<?php $letters = ['Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Θ', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ', 'Ο', 'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Χ', 'Ψ', 'Ω']; ?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<br />
	<h4>Δώσε ένα γράμμα:</h4><br />
	<?php
	for ($i = 0; $i < 24; $i++) {
		echo "<input class='btn-sm buttons' id='$letters[$i]' type='submit' name='letter' value=$letters[$i]>";		
	} 
	?>
	
	</form>
	</div>
</div>
</body>
</html>