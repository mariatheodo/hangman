
<?php 
require 'header.html'; 
echo "<h2>Επεξεργασία λέξης</h2>";
			
$word = $_GET['word'];
$id = $_GET['id'];
$page = $_GET['page'];
			
// ενημέρωση λέξης στη βάση
if (isset($_POST['new'])) {
	$new = $_POST['new'];
	include_once 'connect.php';
	$sql = "UPDATE words SET word = '$new' WHERE words.wid = '$id'";
	mysqli_query($conn, $sql);
		
?>
<div class="row">
<?php 
// μήνυμα για την επιτυχία ή μη της ενημέρωσης
	if (mysqli_affected_rows($conn) > 0) {
		echo ("<h3>Η λέξη ενημερώθηκε</h3>");
	}
	else {
		echo ("<h3>Η ενημέρωση απέτυχε</h3>");
	}
	mysqli_close($conn);
?>
				
</div>
<?php
	}
	else {
?>
		<!-- φόρμα για αλλαγή λέξης -->
		<h3>Θέλεις να αλλάξεις τη λέξη <?php echo " ".$word.";"?></h3>
		<form action="" method="POST">
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<input class="form-control" type="text" name="new" value="<?php echo $word ?>">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">OK</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	<?php } ?>


<a href="admin_words.php?page=<?php echo $page ?>"><button class="btn btn-default btn-lg">Πίσω</button></a>

<?php require 'footer.php'; ?>


