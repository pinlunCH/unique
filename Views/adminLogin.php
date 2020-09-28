<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="adminCss/site.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700&display=swap" rel="stylesheet">
</head>
<body>
<div class="outter">
	<div class="wrapper">	
		<?php
	if(isset($_GET['error'])){?>			
		<div class="error">
			<div class="heading">Something went wrong</div>
			<div class="detail">Please double check your Username and Password</div>
		</div>
		<?php
		}
		?>
		<div class="wallpeper">
			<div class="ribbon">
				<h1>LOGIN</h1>

				<form method="post" action="index.php?controller=admin&action=doLogin" class="loginform">
					<div class="container">
						<div class="fieldset">
							<label>Username</label>
							<input type="text" name="strUsername">
						</div>
						<div class="fieldset">
							<label>Password</label>
							<input type="password" name="strPassword">
						</div>
						<div class="fieldset" id="submit">	
							<input type="submit" class="btn login" value="Login">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>