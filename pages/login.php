<div class="container">
	<div class="row">		
		<div class="col-sm-6 offset-3">
			<h1 class="text-center text-primary">Login</h1>
			<?php show_message(); ?>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>?page=login" method="POST" name="login">				
				<div class="form-group">
		    		<label for="name">Name:</label>
    				<input type="text" class="form-control" id="name" name="name">
		  		</div>	
				<div class="form-group">
		    		<label for="email">Email:</label>
		    		<input type="email" class="form-control" id="email" name="email">
		  		</div>
		  		<button type="submit" class="btn btn-primary" name="login-btn">OK</button>
		  	</form>
		</div>
	</div>
</div>
