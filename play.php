
<?php 
function mb_str_split($string) { 

    return preg_split('/(?<!^)(?!$)/u', $string ); 				//σπάει το string σε array χαρακτηρων, δεν δουλεύει η str_split
} 

//στο τέλος κάθε λέξης ρωτάει τον παίκτη αν θέλει να ξαναπαίξει ή όχι
function play_again() {
	echo '<div class="col-sm-6"><h4>Έχεις συγκεντρώσει '.$_SESSION['points'].' πόντους</h4></div>
		<div class="col-sm-6"><h4>Θέλεις να ξαναπαίξεις;</h4></div><br />';
	echo '<a href="new_game.php?new=true"><button class="btn-sm">ΝΑΙ</button></a>';
	echo '<a href="new_game.php?new=false"><button class="btn-sm">OXI</button></a>';
	echo "</div>";
}

require 'header.html'; 
session_start();
?>

<div class='row'>
	<div class='col-sm-6'>
		<h2>Καλωσήρθες <?php echo $_SESSION['player']; ?></h2>
	</div>
	<div style="float:right;">
		<a href='player_games.php'><button class='btn btn-default btn-lg'>Δες όλα τα παιχνίδια</button></a>
	</div>
</div>

<?php
// αν δεν υπάρχει το $_SESSION['word'], τότε διαλέγει λέξη και βάζει το επίπεδο δυσκολίας που επιλέχθηκε
if (!isset($_SESSION['word'])) {											
	include_once 'connect.php';
	include_once 'choose_word.php';

	$_SESSION['tries_left'] = $_SESSION['lives'];
	
	$len = mb_strlen($word);											
	$_SESSION['word_array'] = mb_str_split($word);							//μετατροπή λέξης σε πίνακα χαρακτήρων
	$print_word = array();
	
	// ο παίκτης θα δει μόνο το πρώτο και το τελευταίο γράμμα της λέξης, τα ενδιάμεσα αντικαθίστανται από παύλες
	$print_word[0] = $_SESSION['word_array'][0];
	for ($i = 1; $i < $len - 1; $i++) {
		$print_word[$i] = "_";
	}
	$print_word[$len - 1] = $_SESSION['word_array'][$len - 1];
	$_SESSION['print_word'] = $print_word;
	// δημιουργείται ο πίνακας με τα χρησιμοποιημένα γράμματα
	$_SESSION['used'] = array();
}

if (isset($_POST['letter'])) {												// έλεγχος γράμματος
	$_SESSION['used'][] = $_POST['letter'];
	
	// αν το γράμμα δεν υπάρχει στη λέξη μειώνονται οι προσπάθειες
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

// αν οι προσπάθειες τελείωσαν εμφανίζει τον κρεμασμένο και ρωτάει αν θα παίξει ξανά
if ($_SESSION['tries_left'] <= 0) {	
	echo "<div class = 'word'>";											
	echo "<h4> Οι προσπάθειές σου τελείωσαν. Έπαιζες με τη λέξη ".$_SESSION['word']."</h4>";
	echo "<img src='img/hangmancrop1.jpg' alt='Hangman'></img>";
	echo "<br />";
	echo "<br />";
	
	play_again();
}
// αν υπάρχουν ακόμη προσπάθειες
else {
	echo "<h4>Έχεις ".$_SESSION['tries_left']." προσπάθειες.";
	if (isset($_POST['letter'])) {
		
		// εμφάνιση γραμμάτων που έχουν χρησιμοποιηθεί
		echo "Έχεις χρησιμοποιήσει ήδη τα γράμματα: ";
		foreach ($_SESSION['used'] as $v) {
			echo $v.", ";
		}
	}
	echo "</h4> <br />";		
	$keys = array_keys($_SESSION['word_array'], $letter);					//αν το γράμμα υπάρχει στη λέξη
	
	for ($i=0; $i < count($keys); $i++) {
		$_SESSION['print_word'][$keys[$i]] = $letter;
	}
	echo "<div class='word'>";
	// αντικατάσταση γραμμάτων στη λέξη
	for ($i = 0; $i < count($_SESSION['print_word']); $i++) {
		echo "<span class='game'>".$_SESSION['print_word'][$i]." </span>";
	}
	if (in_array('_', $_SESSION['print_word'])) {
		$letters = array('Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Θ', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ', 'Ο', 'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Χ', 'Ψ', 'Ω'); ?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<br />
			<h4>Δώσε ένα γράμμα:</h4><br />
	
			<!-- εμφάνιση κουμπιών γραμμάτων -->
			<?php
			for ($i = 0; $i < 24; $i++) {
				echo "<input class='btn-sm buttons' id='$letters[$i]' type='submit' name='letter' value=$letters[$i]>";		
			}
	} 
	//η λέξη συμπληρώθηκε, βαθμολόγηση παίκτη
	if (!in_array('_', $_SESSION['print_word'])) {							
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


?>

	
</form>
</div>

<?php require 'footer.php'; ?>
