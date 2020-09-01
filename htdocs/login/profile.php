<?php
	include'inc/header.php';
	include 'library/User.php';
	Session::checkSession();


if(isset($_GET['id'])){
	$userid=(int)$_GET['id'];
}
     $objuser= new User();
  //update

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])){


	$Update=$objuser->updatUser($userid,$_POST);
}
?>

	<div class="panel panel-default">

		<div style="max-width: 600px; margin:0 auto">
<?php

if(isset($Update)){echo $Update;}
$userData=$objuser->getUserById($userid);
if($userData){ 
?>			

				<div class="panel-headig">
				<h2 >User List <span class="pull-right"><a class="btn btn-success" href="index.php">Back</a></span></h2>
			</div>

				<div class="panel-body">
					<form action="" method="POST">
						<div class="form-group">
							<label for="name">Name :</label>
							<input type="text" id='name' name="Name" class="form-control" value="<?php echo $userData->Name;  ?>">
						</div>
						<div class="form-group">
							<label for="Username">Password:</label>
							<input type="text" id='Username'name="Username" class="form-control" value="<?php echo $userData->Username;  ?>">
						</div>
						<div class="form-group">
							<label for="email">Email :</label>
							<input type="email" id='email' name="Email" class="form-control" value="<?php echo $userData->Email;  ?>"/>
						</div>
						<?php 

						$sessId=session::get('Id');
						if($sessId==$userid){
							?>
						<input type="submit"  value="update" name="update" class="btn btn-success" pull-right"/>

						<?php }?>
					</form>
					<?php }?>
					
					
		</div>	

<?php
include'inc/footer.php';

?>
	