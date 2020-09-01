<?php
include'inc/header.php';
Session::checkLogin();

?>
<?php
include'library/User.php';

$user=new User();

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){


	$login=$user->loginData($_POST);
}

?>

	<div class="panel panel-default">

		<div style="max-width: 600px; margin:0 auto">
				<?php
				     if(isset($login)){
				       echo $login;
				     }
				  ?>     
				<div class="panel-headig">
					<h2 >User List</h2>
				</div>
				<div class="panel-body">
					<form action="" method="POST">
						<div class="form-group">
							<label for="eamil">Email Address:</label>
							<input type="text" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="text" name="password" class="form-control">
						</div>
						<input type="submit"  value="login" name="login" class="btn btn-success" pull-right"/>
					</form>
					
					
				</div>
		</div>	

<?php
include'inc/footer.php';

?>
	