<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-user fa-fw"></i> User Options</h3>
		</div>
		<div class="panel-body">
			<div class="list-group">
				<a href="<?php echo $basefileURI.$credentials."&pageid=settings&action=addusr" ;?>" class="list-group-item">
					<i class="fa fa-fw fa-user-plus"></i> Add User
				</a>
				<a href="<?php echo $basefileURI.$credentials."&pageid=settings&action=remusr" ;?>" class="list-group-item">
					<i class="fa fa-fw fa-user-times"></i> Remove User
				</a>
				<a href="<?php echo $basefileURI.$credentials."&pageid=settings&action=viewusrs" ;?>" class="list-group-item">
					<i class="fa fa-fw fa-users"></i> View Users
				</a>
			</div>
		</div>
	</div>
</div>

<?php
if(strcmp($action, "viewusrs") == 0){
	$result = sqlquery("select * from auth order by Permission DESC");
	?>
	
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-bars fa-fw"></i> User List</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
					<tr>
						<th>Username</th>
						<th>E-Mail</th>
						<th>Account type</th>
						<th>Unique User ID</th>
					</tr>
					<?php
						while($row = mysql_fetch_assoc($result)){
							$permission = "";
							$permissionColor = "";
							switch($row["Permission"]){
								case 1: $permission= "User";
								break;
								case 2: $permission= 'Moderator <i class="fa fa-star-half"></i>';
								$permissionColor = "warning";
								break;
								case 3: $permission= 'Admin <i class="fa fa-star"></i> ';
								$permissionColor = "danger";
								break;
								
								default:
								$permission= "Ghost";
								break;
							}
							$comp = '
						<tr class= "'.$permissionColor.'">
							<td>'.$row["User"].'</td>
							<td>'.$row["EMail"].'</td>
							<td>'.$permission.'</td>
							<td>'.$row["ID"].'</td>
						</tr>';
						
						echo $comp;
						}
					?>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<?php
}
?>

<?php
if(strcmp($action, "remusr") == 0){
	$result = sqlquery("select * from auth order by Permission DESC");
	?>
	
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title pull-left"><i class="fa fa-times fa-fw"></i> User List</h3>
				<p class="pull-right text-info"><i class="fa fa-question-circle fa-fw"></i> Click on the table row to remove a user. (You will be prompted beforehand)</p>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
					<tr>
						<th>Username</th>
						<th>Account type</th>
						<th>Unique User ID</th>
					</tr>
					<?php
						while($row = mysql_fetch_assoc($result)){
							$permission = "";
							$permissionColor = "";
							$uri = $basefileURI."usermod.php".$credentials."&pageid=settings&action=remusr&ruid=".$row["ID"];
							switch($row["Permission"]){
								case 1: $permission= "User";
								break;
								case 2: $permission= 'Moderator <i class="fa fa-star-half"></i>';
								$permissionColor = "warning";
								break;
								case 3: $permission= 'Admin <i class="fa fa-star"></i> ';
								$permissionColor = "danger";
								break;
								
								default:
								$permission= "Ghost";
								break;
							}
							$comp = '
						<tr class= "'.$permissionColor.'" onclick="window.location.href =\''.$uri.'\'" style="cursor:pointer;">
							<td>'.$row["User"].'</td>
							<td>'.$permission.'</td>
							<td>'.$row["ID"].'</td>
						</tr>';
						
						echo $comp;
						}
					?>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<?php
}
?>

<?php
if(strcmp($action, "addusr") == 0){
	$result = sqlquery("select * from auth order by Permission DESC");
	?>
	
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-plus fa-fw"></i> Add User</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<div class="list-group-item">
						<form class="form-horizontal" id="cuform" role="form" action="usermod.php<?php echo $credentials; ?>" method="post">
							<div class="form-group">
								<label class="control-label col-sm-2" for="fuser"><i class="fa fa-user fa-fw fa-lg"></i></label>
								<div class="col-sm-10"> 
									<input type="text" class="form-control" id="fuser" name="cusername" placeholder="Username">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="femail"><i class="fa fa-at fa-fw fa-lg"></i></label>
								<div class="col-sm-10"> 
									<input type="email" class="form-control" id="femail" name="cemail" placeholder="E-Mail">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="fpwd"><i class="fa fa-key fa-fw fa-lg"></i></label>
								<div class="col-sm-10"> 
									<input type="password" class="form-control" id="fpwd" name="cpassword" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="fpwd"><i class="fa fa-star-o fa-fw fa-lg"></i></label>
								<div class="col-sm-10"> 
									<select class="form-control" name="cpermissions">
										<option>User</option>
										<option>Moderator</option>
										<option>Admin</option>
									</select>
								</div>
							</div>
						</form>
					</div>
					<div class="list-group-item">
						<input type="submit" form="cuform" class="btn btn-block btn-info" value="Create User"/>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<?php
}
?>