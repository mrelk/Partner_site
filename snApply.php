<?php
include('incsession.php');
include 'header.php';
include 'leftManuList.php';

echo <<<END
<div class="container">
  <form class="form-horizontal" action="snApplySend.php" method="POST">
	<div style="height:30px;width:80%;background-color:#EEEEEE;text-align:left;line-height:30px;color:#000000">Hoem > Shopping history > SN Apply</div>
    <div style="height:20px;"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label">SN  :</label>
		<div class="col-sm-10">
			<input class="form-control" id="focusedInput" type="text" name="snValue" value="$snValue">
			<input style="text-align:center;color:#4B5765;position:relative;width:60px;" type="submit" name="submit" value="Submit">	  
		</div>
	</div>
  </form>
</div>

END;

include 'bottom.php';
?>