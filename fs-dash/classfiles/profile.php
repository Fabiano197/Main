<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-refresh fa-fw"></i> Edit information</h3>
		</div>
		<div class="panel-body">
			<div class="list-group">
				<div class="list-group-item">
					<form class="form-horizontal" id="cuform" role="form" action="usermod.php<?php echo $credentials."&pupdate=1"; ?>" method="post">
						<div class="form-group">
							<label class="control-label col-sm-2" for="fuser"><i class="fa fa-user fa-fw fa-lg"></i></label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" id="fuser" name="pupdatename" placeholder="Username">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="femail"><i class="fa fa-at fa-fw fa-lg"></i></label>
							<div class="col-sm-10"> 
								<input type="email" class="form-control" id="femail" name="pupdatemail" placeholder="E-Mail">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="fpwd"><i class="fa fa-key fa-fw fa-lg"></i></label>
							<div class="col-sm-10"> 
								<input type="password" class="form-control" id="fpwd" name="pupdatepasswd" placeholder="Password">
							</div>
						</div>
					</form>
				</div>
				<div class="list-group-item">
					<input type="submit" form="cuform" class="btn btn-block btn-info" value="Update Info"/>
				</div>
			</div>
		</div>
	</div>
</div>