<?php
include('incsession.php');
include 'header.php';
include 'leftManuList.php';

	$con = mysql_connect($db_host, $db_user, $db_pass);
    mysql_select_db($db_name, $con);
	$userId = $_COOKIE['userId'];
    
    $query = "SELECT * FROM userSN WHERE userid = '$userId'";
        //echo $query;
    $total = mysql_query($query, $con)
    	or die ('Error in query');
	
	// status : 0 -> pending
	// status : 1 -> review
	// status : 2 -> validate
	
	$query = "SELECT * FROM userSN WHERE userid = '$userId' and status = 0";
        //echo $query;
    $pending = mysql_query($query, $con)
    	or die ('Error in query');
		
	$query = "SELECT * FROM userSN WHERE userid = '$userId' and status = 1";
        //echo $query;
    $review = mysql_query($query, $con)
    	or die ('Error in query');
		
	$query = "SELECT * FROM userSN WHERE userid = '$userId' and status = 2";
        //echo $query;
    $validate = mysql_query($query, $con)
    	or die ('Error in query');
		
	if (!mysql_num_rows($total)) {
		$total = 0;
	} else {
		$total = mysql_num_rows($total);
	}
	
	if (!mysql_num_rows($pending)) {
		$pending = 0;
	} else {
		$pending = mysql_num_rows($pending);
	}
	
	if (!mysql_num_rows($review)) {
		$review = 0;
	} else {
		$review = mysql_num_rows($review);
	}
	
	if (!mysql_num_rows($validate)) {
		$validate = 0;
	} else {
		$validate = mysql_num_rows($validate);
	}
	
echo <<<END
<div class="container">
  <form class="form-horizontal" action="snApply.php" method="POST">
	<div style="height:30px;width:80%;background-color:#EEEEEE;text-align:left;line-height:30px;color:#000000">
	Hoem > Shopping History
	</div>
    <div style="height:20px;"></div>
	<div style="width:50%;display:inline-block;">Review : $review	Pending : $pending  Effective : $validate</div>
	<div style="width:30%;display:inline-block;">
		<input style="color:#4B5765;position:relative;width:80px;" type="submit" name="submit" value="SN Apply">
	</div>
END;
		
	if ($total != 0)
    {
		$per = 2;
		$pages = ceil($total/$per); //取得不小於值的下一個整數
		if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
			$page=1; //則在此設定起始頁數
		} else {
			$page = intval($_GET["page"]); //確認頁數只能夠是數值資料
		}
		$start = ($page-1)*$per; //每一頁開始的資料序號
		$query = "SELECT * FROM userSN WHERE userid = '$userId'";
		$result = mysql_query($query.' LIMIT '.$start.', '.$per,$con) or die("Error");
	
echo <<<END
	<div style="height:20px;"></div>
	<div style="width:80%;">
	<table style="width:100%;">
	<tr style="width:100%;background-color:#EEEEEE;text-align:left;line-height:30px;color:#000000">
		<td style="text-align: center;width:25%;">SN No.</td>
		<td style="text-align: center;width:25%;">Product Name</td>
		<td style="text-align: center;width:25%;">Effective Date</td>
		<td style="text-align: center;width:25%;">Status</td>
	</tr>
END;

		while ($row = mysql_fetch_array ($result))
		{
			$snNumber=$row['snNumber'];
			$productName=$row['productName'];
			$status=$row['status'];
			$effectiveDate=$row['effectiveDate'];
	
echo <<<END
    <tr>
        <td style="text-align: center;">$snNumber</td>
        <td style="text-align: center;">$productName</td>
		<td style="text-align: center;">$effectiveDate</td>
		<td style="text-align: center;">$status</td>
    </tr>
END;

		}
	}

echo <<<END
	</table>
	</div>
END;

//echo 'Total '.$total.' page :'.$page.' Total Page :'.$pages;
    //echo "<br /><a href=?page=1>1</a> ";
    echo "Page ";
    for( $i=1 ; $i<=$pages ; $i++ ) {
        if ( $page-3 < $i && $i < $page+3 ) {
            echo "<a href=?page=".$i.">".$i."</a> ";
        }
    } 
    echo "<a href=?page=".$pages.">Last Page</a><br /><br />";

echo <<<END
  </form>
</div>
END;
	
include 'bottom.php';
?>