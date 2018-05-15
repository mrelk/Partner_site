<?php
include('incsession.php');
include 'header.php';

	$con = mysql_connect($db_host, $db_user, $db_pass);
    mysql_select_db($db_name, $con);
	$userId = $_COOKIE['userId'];
    
    $query = "SELECT * FROM userCustom WHERE id = '$userId'";
        //echo $query;
    $result = mysql_query($query, $con)
    	or die ('Error in query');
	
	if (!mysql_num_rows($result))
    {
		header('Location: userHomePage.php');
	}
	
	$row = mysql_fetch_row($result);
	//echo $row[0];
	$mail = $row[0];
	$pw = $row[1];
	$companyName = $row[2];
	$userType = $row[3];
	$firstName = $row[4];
	$lastName = $row[5];
	$title = $row[6];
	$phone = $row[7];
	$city = $row[8];
	$country = $row[9];
	$zipCode = $row[10];
	$webSite = $row[11];
	

include 'leftManuList.php';

echo <<<END
<div class="container">
  <form class="form-horizontal" action="modifyUserInfoCheck.php" method="POST">
	<div style="height:30px;width:80%;background-color:#EEEEEE;text-align:left;line-height:30px;color:#000000">Hoem > Personal Information > Modify</div>
    <div style="height:20px;"></div>
	<div class="form-group">
      <label class="col-sm-2 control-label">Partner Company Name:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="companyName" value="$companyName">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">User Type:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="userType" value="$userType">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">First Name:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="firstName" value="$firstName">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">Last Name:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="lastName" value="$lastName">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">Title:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="tittle" value="$title">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">Work Mail:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="mail" value="$mail">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">Phone Number:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="phone" value="$phone">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">City:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="city" value="$city">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">Country:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="country" value="$country">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">Zip/Postal Code:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="zipCode" value="$zipCode">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">Website:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="website" value="$webSite">
      </div>
	  
	  <div style="height:5px;"></div>
	  <label class="col-sm-2 control-label">Password:</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" name="pw" value="$pw">
      </div>
	  
	  <div style="width:100%;height:30px;"></div>
	  <div style="color:#ffffff;width:60px;margin:auto;">
		<input style="text-align:center;color:#4B5765;position:relative;width:100%;" type="submit" name="submit" value="Submit">
	  </div>
	  
    </div>
  </form>
</div>

END;

include 'bottom.php';

?>
