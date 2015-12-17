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
	<?php 
	if (isset($_POST['name']) && $_POST['name'] == '123456') {
		header("Location: admin_pages.php");
	}
	else { ?>
	<div class="container">
		<div class="row">
			<div class="page-header">
				<h1>ΚΡΕΜΑΛΑ</h1>
			</div>
		</div>
		<div class="jumbotron main-page">
			<h3>Καλωσήρθες διαχειριστή</h3>
			<h3>Δώσε το συνθηματικό σου</h3>
			<h3></h3>
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
		
		</div>
		
		
		
    
	</div>
	<?php } ?>

  
</body>
</html>