

<?php
session_start();
?>

<html>

<body>
<?php
if (!isset($_SESSION['word'])) {
	include_once 'connect.php';
	include_once 'choose_word.php';
	$_SESSION['lives'] = 5;
}

//echo $word."<br />";


$word = $_SESSION['word'];

$len = mb_strlen($word);
$word_array = mb_str_split($word);
$print_word = array();
$print_word[0] = $word_array[0];
for ($i = 1; $i < $len - 1; $i++) {
	$print_word[$i] = "_";
}
$print_word[$len - 1] = $word_array[$len - 1];
$_SESSION['print_word'] = $print_word;


echo "<br />";

if (isset($_POST['letter'])) {
	if (in_array($_POST['letter'], $word_array) === FALSE) {
		--$_SESSION['lives'];
	}
	$letter = $_POST["letter"];
}
else {
	$letter = '';
}


if ($_SESSION['lives'] == 0) {
	echo "<p> Έπαιζες με τη λέξη ".$word."</p>";
	echo "<p> <a href='play.php'>Θέλεις να ξαναπαίξεις;</p>";
	unset($_SESSION['word']);
}
else {
		
	
	$keys = array_keys($word_array, $letter);
	
	for ($i=0; $i < count($keys); $i++) {
		$print_word[$keys[$i]] = $letter;
	}
	for ($i = 0; $i < count($print_word); $i++) {
		echo "<span id='game'>$print_word[$i] </span>";
	}
	
	if (!in_array('_', $print_word)) {
		echo "\n\n" . '  <p><a href="play.php">Θέλεις να παίξεις ξανά?</a></p>';
		unset($_SESSION['word']);
	}
}





function mb_str_split($string) { 

    return preg_split('/(?<!^)(?!$)/u', $string ); 	// σπαω το string σε array χαρακτηρων, δεν δουλεύει η str_split
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