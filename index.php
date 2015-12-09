<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Hangman Game (Κρεμάλα)</title>
	<link rel="stylesheet" href="css/bootstrap.css">
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
	<div class="container">
		<?php 
			
			session_start();
			if (!isset($_SESSION['word'])) {
				include_once 'connect.php';
			}
			include_once 'choose_word.php';
			
			$_SESSION['word'] = $word;
			header("Location:play.php");
			
			

		?>
		<br />
		
		
		
			
			
			


		
		
    
	</div>

  
</body>
</html>