<?php
include_once 'header.html';

?>

<h3>Σελίδα διαχείρισης</h3>
<h3>Τι θέλεις να κάνεις;</h3>
	<div class="row center-block">
		<form action="index.php" method="POST">
			<input class="btn btn-default btn-sm" type="submit" value="Διαχείριση λέξεων" formaction="admin_words.php">
			<input class="btn btn-default btn-sm" type="submit" value="Διαχείριση παιχνιδιών" formaction="admin_games.php">
			<input class="btn btn-default btn-sm" type="submit" value="Διαχείριση παικτών" formaction="admin_players.php">
			<br />
			<input class="btn btn-default btn-lg" name="back" type="submit" value="Πίσω">
		</form>
	</div>

</div>
</div>
</body>
</html>
