<?php
session_start();
?>

<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Hangman Game (Κρεμάλα)</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:100,300' rel='stylesheet' type='text/css'>
	<script src="js/bootstrap.js"></script>
	
	<script src="css/config.json"></script>
	<style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
		.en-markup-crop-options {
		top: 18px !important;
		left: 50% !important;
		margin-left: -100px !important;
		width: 200px !important;
		border: 2px rgba(255,255,255,.38) solid !important;
		border-radius: 4px !important;
		}

		.en-markup-crop-options div div:first-of-type {
		margin-left: 0px !important;
		}
	</style>



</head>

<body>
<body>
	<div class="container">
		<div class="row">
			<div class="page-header">
				<h1>ΚΡΕΜΑΛΑ</h1>
			</div>
		</div>
		<div class="jumbotron main-page">
<?php

echo "<h2>Καλωσήρθες ".$_SESSION['player']."</h2><br />";


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
}

echo "<br />";

if (isset($_POST['letter'])) {												//έλεγχος γράμματος
	if (in_array($_POST['letter'], $_SESSION['word_array']) === FALSE) {
		--$_SESSION['tries_left'];
		echo "<h4> Λυπάμαι, το γράμμα που διάλεξες δεν υπάρχει στη λέξη</h4>";
	}
	$letter = $_POST["letter"];
}
else {
	$letter = '';
}

if ($_SESSION['tries_left'] == 0) {												//τελειώνουν οι προσπάθειες
	echo "<h4> Οι προσπάθειές σου τελείωσαν. Έπαιζες με τη λέξη ".$_SESSION['word']."</h4>";
	echo "<h4> <a href='play.php'>Θέλεις να ξαναπαίξεις;</a></h4>";
	unset($_SESSION['word']);
	
}
else {
	echo "<h4>Έχεις ".$_SESSION['tries_left']." προσπάθειες</h4> <br />";		
	$keys = array_keys($_SESSION['word_array'], $letter);					//το γράμμα υπάρχει στη λέξη
	
	for ($i=0; $i < count($keys); $i++) {
		$_SESSION['print_word'][$keys[$i]] = $letter;
	}
	echo "<h4>";
	for ($i = 0; $i < count($_SESSION['print_word']); $i++) {
		echo "<span id='game'>".$_SESSION['print_word'][$i]." </span>";
	}
	
	if (!in_array('_', $_SESSION['print_word'])) {							//η λέξη συμπληρώθηκε
		echo "\n\n" . '  <p><a href="play.php">Μπράβο! Θέλεις να ξαναπαίξεις;</a></p>';
		unset($_SESSION['word']);
	}
	echo "</h4>";
}

function mb_str_split($string) { 

    return preg_split('/(?<!^)(?!$)/u', $string ); 							// σπαω το string σε array χαρακτηρων, δεν δουλεύει η str_split
} 
?>
	<?php $letters = ['Α', 'Β', 'Γ', 'Δ', 'Ε', 'Ζ', 'Η', 'Θ', 'Ι', 'Κ', 'Λ', 'Μ', 'Ν', 'Ξ', 'Ο', 'Π', 'Ρ', 'Σ', 'Τ', 'Υ', 'Φ', 'Χ', 'Ψ', 'Ω']; ?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<h4>Δώσε ένα γράμμα:</h4><br />
	<?php
	for ($i = 0; $i < 24; $i++) {
		echo "<input class='btn-sm' id='$letters[$i]' type='submit' name='letter' value=$letters[$i] onclick=disable()>";
	} 
	?>
	
	<script>
		function disable() {
			document.getElementById("<?php $_POST['letter'] ?>").disabled = true; }
	</script>
	
	</form>
	</div>
</div>
</body>
</html>