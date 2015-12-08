<?php
//session_start();
$a="COUNT(*)";															//στη μεταβλητή $a δίνω το count γιατί δεν το δέχεται αλλιώς
																		//για να πάρω το πλήθος του πίνακα
$count = "SELECT $a FROM word;";										//κάνω την ερώτηση

$result = mysqli_query($conn, $count);									//αποτέλεσμα
$row = mysqli_fetch_assoc($result);										

$wid = mt_rand(1,$row[$a]);												//τυχαίο id από τον πίνακα word
//echo $wid."<br />";

$sql = "SELECT * FROM word WHERE wid = $wid;";							//βρίσκω τη λέξη που αντιστοιχεί στο id
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	while($row = mysqli_fetch_assoc($result)) {
    $word = $row["word"];}
	//print_r($word);
}
mysqli_close($conn);
//$_SESSION['word'] = $word;


?>
