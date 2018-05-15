<html>
<head><title>Login</title>
</head>
<body>



<footer class="container-fluid foot-wrap">
	
	<p align="center" style="margin-top: 60px;color:#878B91;">
            
        </p>
        <div class="container">
		<div style=height:40px/>
		    <div style="background-color:#154C85;width:300px;height:300px;margin:0 auto;">
			<img src='./resource/LoginPageBk.png' style="display:block;margin:auto;">
			<form action="loginCheck.php" method="POST">
				<div style="width:100%;height:40px;"></div>
				<div style="color:#ffffff;width:30%;margin:auto;text-align:center;display:inline-block;">
				Email :
				</div>
				<div style="width:60%;margin:auto;display:inline-block;">
					<input type="text" name="email">
				</div>
				
				<div style="width:100%;height:10px;"></div>
				<div style="color:#ffffff;width:30%;margin:auto;text-align:center;display:inline-block;">
				Password :
				</div>
				<div style="width:60%;margin:auto;display:inline-block;">
					<input type="password" name="password">
				</div>
				<br />
				<div style="width:100%;height:10px;"></div>
				<div style="color:#ffffff;width:80%;margin:auto;text-align:right;">
					Lost your password?
				</div>
				<div style="width:100%;height:5px;"></div>
				<div style="color:#ffffff;width:80%;margin:auto;text-align:right;">
					<a href="signUp.php" style="text-decoration:none;color:#ffffff">Sign up</a>
				</div>
				<div style="width:100%;height:30px;"></div>
				<div style="color:#ffffff;width:100%;margin:auto;">
					<input style="color:#4B5765;position:relative;left:10%;width:80%;" type="submit" name="submit" value="Submit">
					<input type="hidden" name="refer" value="<?php echo (isset($_GET['refer'])) ? $_GET['refer'] : 'index.php'; ?>">
				</div>
			</form>
			</div>
        </div><!--/.container-->
        
        <p align="center" style="margin-top: 100px;color:#878B91;">
            Copyright &copy;2018 Accelstor
        </p>
</footer>

</body>
</html>