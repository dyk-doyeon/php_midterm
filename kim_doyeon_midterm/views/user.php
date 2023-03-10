<div id="content" class="row">
  <div class="textEnd"><a href="index.php"><h3>X</h3></a></div>
<?php

echo 
			'<div class="col-12 med-col-2"><img id="empImage" alt="User Photo" src="./images/person1.jpg"></div>
			<div id="empDetails" class="col-12 med-col-10"> <span class="centerDetails"><span class="label">Name:</span> '.$users[0]->user_fname.' '.$users[0]->user_lname.'<br><br>
			<span class="label">Username:</span> '.$users[0]->user_username.'<br><br>
      <span class="label">Role:</span> '.$users[0]->role_name.'<br><br>
			<span class="label">Role Description:</span> '.$users[0]->role_description.'<br></span></div>'
		;
?>
<br><br>
<div id="content" class="row">
  <div class="marginTop">
    <?php	
    echo '<a href="http://localhost:8888/kim_doyeon_midterm/index.php?task=delete&user_id='.$users[0]->user_id.'">Delete User Information</a><br>';
    echo '<a href="http://localhost:8888/kim_doyeon_midterm/index.php?task=update&user_id='.$users[0]->user_id.'">Update User Information</a>';
    ?>
  </div>
</div>