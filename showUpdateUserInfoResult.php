<?php
include('incsession.php');
include 'header.php';

include 'leftManuList.php';

$res = $_GET["res"];
if (strcmp($res, "true") == 0) {
	echo <<<END
	<div class="container">
	Update User Information Sucessful!!
	</div>
END;
} else {
	echo <<<END
	<div class="container">
		Update User Information Fail!!
	</div>
END;
}

include 'bottom.php';

?>