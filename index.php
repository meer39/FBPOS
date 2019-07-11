<?php
	//Start session
	session_start();
	if(isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_FIRST_NAME']) && isset($_SESSION['SESS_LAST_NAME']))
	{
		header('location: main/index.php');
	}
?>
<html>
	<head>
		<title> fb - Fashion Botique </title>
		<link href="main/bs/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
	</head>
	<body style="width: 50%; margin: 100px auto">
	<h1 class="display-4 text-center"> fb - Fashion Botique</h1>
		<div id="loginform">
			<?php
				if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
					foreach($_SESSION['ERRMSG_ARR'] as $msg) {
						echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
					}
					
					unset($_SESSION['ERRMSG_ARR']);
				}
			?>
			<form action="login.php" method="post">
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Username" required />
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required/>
				</div>
				<input class="btn btn-success btn-submit float-right" type="submit" value="Login" />
			</form>
		</div>
	</body>
</html>