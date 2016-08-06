<?php

require "/../../fs-dash/userstats.php";
require "/../../fs-dash/userObject.php";

session_start();

$user = new UserObject($_SESSION['uuid'],$_SESSION["authkey"]);
$userstats = new Userstats();

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $userstats->getName($user); ?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
					<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://www.karar.com/assets/default/img/yorum.png" class="img-circle img-responsive"> </div>
						<div class=" col-md-9 col-lg-9 "> 
							<table class="table table-user-information">
								<tr>
									<td>Fortschritt:</td>
									<td>
										<div class="progress">
										
										<?php
										
										?>
											<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $userstats->getProgress($user); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $userstats->getProgress($user); ?>%;">
												<?php echo $userstats->getProgress($user).'%'; ?>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td>Letzte Lektion:</td>
									<td><?php echo $userstats->getLastLoc($user); ?></td>
								</tr>
								<tr>
									<td>Registriert seit:</td>
									<td><?php echo $userstats->getRegDate($user); ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"> Hilfe</i></a>
					<span class="pull-right">
						<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger">Account löschen <i class="glyphicon glyphicon-remove"></i></a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>