
<?php
$filepath=realpath(dirname(__FILE__));
include_once $filepath.'/../library/Session.php';
Session::init();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Register System PHP</title>
	<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css"/>
	<script type="text/javascript" src="inc/bootstrap.min.js"></script>
</head>

<?php

if(isset($_GET['action']) && $_GET['action']=='logout' ){

	Session::destroy();

}

?>

<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href='index.php'><h2>Login Register System</h2></a>
				</div>
				<ul class="nav navbar-nav pull-right">
					
					<?php
					$id=Session::get('Id');
					$login=Session::get('login');
					if($login==true){
					?>
					<li><a href="Profile.php?id=<?php echo$id; ?>">Profile</a></li>
					<li><a href="?action=logout">Logout</a></li>
					<?php
					}else{

					?>
					<li><a href="Login.php">Login</a></li>
					<li><a href="Register.php">Register</a></li>
				<?php } ?>
				</ul>
			</div>
		</nav>