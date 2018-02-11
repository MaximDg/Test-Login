<?php 

$dbName = db()->query('SELECT id, name, second_name, email, file, description, file FROM registration');
while ($row = $dbName->fetch_object()) {
	if ($row->email == $email): ?>	  			

    <div class="container"> 
      <div class="row">   
        <div class="col-sm-11">
          <?php show_message(); ?>
          <h1 class="text-center text-primary">Your profile</h1>
            <table border="1" class="text-center table table-hover">
              <tr class="text-info">
                <th>Name</th>
                <th>Second name</th>
                <th>Email</th>
                <th>Description</th>
                <th>Avatar</th>
              </tr>
              <?php 
              		echo '<tr class="td-text">';
              		echo '<td>'.$row->name.'</td>';
              		echo '<td>'.$row->second_name.'</td>';
              		echo '<td>'.$row->email.'</td>';
              		echo '<td>'.$row->description.'</td>';
                  echo '<td class="td-img"><img src="'.$row->file.'" class="img-small"></td>';
              		echo '</tr>';
              ?>
            </table>
        </div>
      </div>
    </div>
    <div class="container"> 
      <div class="row">   
        <div class="col-sm-6 offset-3">  
          <h3 class="text-center text-primary">Edit your profile:</h3>
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>?page=my-profile" method="POST" enctype="multipart/form-data" name="edit"  id="form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row->name ?>" required>
              </div>
              <div class="form-group">
                <label for="secondName">Second name:</label>
                <input type="text" class="form-control" id="secondName" name="secondName" value="<?php echo $row->second_name ?>" required>
              </div>  
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row->email ?>" readonly>
                <p class="text-danger">*You can not change your e-mail address!</p>
              </div>  
              <div class="form-group">
                  <label for="description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Description</font></font></label>
                  <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $row->description ?></textarea>
              </div>
              <div class="form-group">
                <label for="ava">Choose your avatar:</label>
                <input type="file" class="form-control-file" id="ava" name="ava" accept="image/*">
              </div>  
              <input type="hidden" name="id" value="<?php echo $row->id ?>">
              <button type="submit" class="btn btn-primary offset-5 btn-save" id="button_edit" name="edit" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Save</font></font></button>
            </form>
        </div> 
      </div> 
    </div>
  <?php endif; ?>
<?php }; ?>
	  		





