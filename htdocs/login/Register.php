<?php
include'inc/header.php';

?>
<?php
include'library/User.php';

$user=new User();

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitData'])){


	$info=$user->regisData($_POST);
}

?>

	<div class="panel panel-default">
		

		<div style="max-width:600px; margin:0 auto">
			<?php
       if(isset($info)){
       	echo $info;
       }

		?>
				<div class="panel-headig">
					<h2>Registration Form:</h2>
				</div>
				<div class="panel-body">
					<form action="" method="POST">
						<div class="form-group">
							<label for="name">Name :</label>
							<input type="text" id='name' name="Name" class="form-control">
						</div>
						<div class="form-group">
							<label for="Username">Username:</label>
							<input type="text" id='Username'name="Username" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email :</label>
							<input type="email" id='Email' name="Email" class="form-control">
						</div>
						<div class="form-group">
							<label for="Password">Password :</label>
							<input type="Password" id='Password' name="Password" class="form-control">
						</div>
						<input type="submit"  value="Submit" name="submitData" class="btn btn-success" pull-right"/>
					</form>
					
					
				</div>
		</div>	

<?php
include'inc/footer.php';

?>
	