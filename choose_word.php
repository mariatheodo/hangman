<?php
//session_start();
$a="COUNT(*)";															//στη μεταβλητή $a δίνω το count γιατί δεν το δέχεται αλλιώς
																		//για να πάρω το πλήθος του πίνακα
$count = "SELECT $a FROM words;";										//κάνω την ερώτηση

$result = mysqli_query($conn, $count);									//αποτέλεσμα
$row = mysqli_fetch_assoc($result);										

$wid = mt_rand(1,$row[$a]);												//τυχαίο id από τον πίνακα word

$sql = "SELECT * FROM words WHERE wid = $wid;";							//βρίσκω τη λέξη που αντιστοιχεί στο id
$result = mysqli_query($conn, $sql);

$word = mysqli_fetch_assoc($result)["word"];

mysqli_close($conn);
$_SESSION['word'] = $word;


?>
