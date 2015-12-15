<?php 
include_once 'header.html';
?>
			<h3>Θέλεις να παίξεις κρεμάλα;</h3>
			<h3>Δώσε το επίπεδο δυσκολίας και το όνομά σου</h3>
			<h3>Επίπεδο δυσκολίας: </h3>
			<form action="player.php" method="POST">
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="radio" name="level" value="10">
						</span>
						<p class="form-control">Εύκολο</p>
					</div>
				</div> 
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="radio" name="level" value="7">
						</span>
						<p class="form-control">Μέτριο</p>
					</div>
				</div>
			</div>		
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">
							<input type="radio" name="level" value="5">
						</span>
						<p class="form-control">Δύσκολο</p>
					</div>
				</div>
			</div>
			<h3>Όνομα: </h3>
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" name="name" placeholder="Όνομα" required>
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">OK</button>
						</span>
					</div>
				</div>
			</div>
			</form>
		
		</div>
		
		
		
    
	</div>

  
</body>
</html>