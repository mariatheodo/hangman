
	<?php 
	//πρώτα γίνεται έλεγχος αν δόθηκε password και είναι σωστό, τότε ανακατεύθυνση στo αρχείο admin_pages.php
	if (isset($_POST['name']) && $_POST['name'] == '123456') {
		header("Location: admin_pages.php");
	}
	else { 
		require 'header.html'; ?>
		
		<h3>Καλωσήρθες διαχειριστή</h3>
		<h3>Δώσε το συνθηματικό σου</h3>
		<h3></h3>
				
		<!-- δημιουργία φόρμας για είσοδο password διαχειριστή -->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<input type="password" class="form-control" name="name" placeholder="password">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">OK</button>
						</span>
					</div>
				</div>
			</div>
		</form>
		<?php } 
		

		require 'footer.php'; ?>
  		