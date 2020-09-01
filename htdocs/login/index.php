<?php

include'inc/header.php';
include'library/User.php';
Session::checkSession();



?>
<?php


$loginmsg=Session::get('loginmsg');
if(isset($loginmsg)){
	echo $loginmsg;
}

Session::set('loginmsg',NULL);
?>

		<div class="panel panel-default">
			<div class="panel-headig">
				<h2 >User List <span class="pull-right"><strong>Welcome</strong>
					<?php
					$uname=Session::get("Username");
					if(isset($uname)){
						echo $uname;
					}

					?>
					</span></h2>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<th width="20%">Serial</th>
					<th width="20%">Name</th>
					<th width="20%">Username</th>
					<th width="20%">Email</th>
					<th width="20%">Action</th>
<?php
$i=0;
 $user=new User();
$u=$user->getUserData();
if($u){
	foreach ($u as $data) {
		$i++;
?>

					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['Name']; ?></td>
						<td><?php echo $data['Username']; ?></td>
						<td><?php echo $data['Email']; ?></td>
						<td>
							<a class='btn btn-primary' href="profile.php?id=<?php  echo $data['Id']; ?>">view</a>
						</td>
					</tr>

				<?php }}else{?>
					<tr><td><h2>No Data Found</h2></td></tr>
					
				<?php } ?>	
				</table>
			</div>
		

	<?php

include'inc/footer.php';


?>
