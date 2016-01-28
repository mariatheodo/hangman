
<?php
require 'header.html';
$page = $_GET['page'];
		
echo "<h2>Αναζήτηση λέξης</h2>";
		
// αν δόθηκε λέξη, την ψάχνει στη βάση
if (isset($_POST['new'])) {
	$new = $_POST['new'];
	include_once 'connect.php';
	$sql = "SELECT word FROM words WHERE word='$new'";
	mysqli_query($conn, $sql);
			
		
	echo "<div class='row'>";
	if (mysqli_affected_rows($conn) > 0) {
				
		// μήνυμα επιτυχούς εισαγωγής
		echo "<h3>Η λέξη ".$new." υπάρχει στη βάση</h3>";
	}
	else {
		// μήνυμα αποτυχίας εισαγωγής
		echo "<h3>Η λέξη ".$new." δεν υπάρχει στη βάση</h3>";
	}
	echo "</div>";
		
}
else {
	?>
	<h3>Ποιά λέξη θέλεις να ψάξεις;</h3>
			
	<!-- φόρμα για εισαγωγή λέξης -->
	<form action="" method="POST">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<input class="form-control" type="text" name="new">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">OK</button>
						</div>
				</div>
			</div>
		</div>
	</form>
			
<?php } ?>
<a href="search_words.php?page=<?php echo $page; ?>"><button class="btn btn-default btn-lg">Αναζήτηση άλλης λέξης</button></a>
<a href="admin_words.php?page=<?php echo $page; ?>"><button class="btn btn-default btn-lg">Πίσω</button></a>


<?php require 'footer.php'; ?>
