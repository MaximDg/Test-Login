<?php 
if(isset($_POST['button']))
{	
	registration();
}	
?>

<div class="container">	
	<div class="row">		
		<div class="col-sm-6 offset-3">
			<h1 class="text-center text-primary">Registration</h1>

			<?php if (!isset($_SESSION['user'])) {
  				show_message();
			}?>	

			<form action="<?php echo $_SERVER['PHP_SELF'] ?>?page=sign-up" method="POST" enctype="multipart/form-data" name="singup" id="form">
				<div class="form-group">
		    		<label for="name">Name:</label>
		    		<input type="text" class="form-control" id="name" name="name" required>
		  		</div>
		  		<div class="form-group">
		    		<label for="secondName">Second name:</label>
		    		<input type="text" class="form-control" id="secondName" name="secondName" required>
		  		</div>	
				<div class="form-group">
		    		<label for="email">Email:</label>
		    		<input type="email" class="form-control" id="email" name="email" required>
		  		</div>	
		  		<div class="form-group">
                    <label for="description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Description</font></font></label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
		  		<div class="form-group">
		    		<label for="ava">Choose your avatar:</label>
    				<input type="file" class="form-control-file" id="ava" name="ava" accept="image/*">
		  		</div>	
		  		<button type="submit" class="btn btn-primary offset-5" id="button_registration" name="button" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sign Up</font></font></button>
		  	</form>	
		</div>
	</div>
</div>
