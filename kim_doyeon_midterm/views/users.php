<div id="content" class="row">
	<ul>
		<?php
		for($i = 0; $i < $rows; $i++) { 
			echo '<a class="col-12 med-col-6" href="index.php?user_id='.$users[$i]->user_id.'"><li>'.$users[$i]->user_fname.' '.$users[$i]->user_lname.'</li></a>';
		}
		?>
	</ul>
</div>

