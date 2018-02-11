<?php 
require_once('functions.php');
?>

 <?php 
  $result = db()->query('SELECT id, name, second_name, email, description, file FROM registration');
 ?>

<div class="container"> 
  <div class="row">   
    <div class="col-sm-11">
      <h1 class="text-center text-primary">All profiles</h1>
        <table border="1" class="text-center table table-hover">
          <tr class="text-info">
            <th>Name</th>
            <th>Second name</th>
            <th>Email</th>
            <th>Description</th>
            <th>Avatar</th>
          </tr>

          <?php 
          	while ($row = $result->fetch_object()) {
          		echo '<tr class="td-text">';
          		echo '<td>'.$row->name.'</td>';
          		echo '<td>'.$row->second_name.'</td>';
          		echo '<td>'.$row->email.'</td>';
          		echo '<td>'.$row->description.'</td>';
              echo '<td class="td-img"><img src="'.$row->file.'" class="img-small"></td>';
          		echo '</tr>';         
            }
          ?>
        </table>
    </div>
  </div>
</div>

<script>
  $('.img-small').mouseover(function(){

    $('.container').append('<div class="modalDiv"><button type="submit" class="btn btn-warning btn-close"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Close</font></font></button></div>');

    $(this).clone().addClass('img-big').appendTo(".modalDiv");

    $('.btn-close').click(function(){
        $('.img-big').removeClass('img-big');
        $('.modalDiv').remove();
    });
  });
</script>
