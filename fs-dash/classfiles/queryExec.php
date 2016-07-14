<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-database fa-fw"></i> Create Database Query</h3>
		</div>
		<div class="panel-body">
			<div class="list-group">
				<div class="list-group-item">
					<form class="form-horizontal" id="dbuform" role="form" action="index.php<?php echo $credentials."&pageid=db"; ?>" method="post">
						<div class="form-group">
							<div class="col-lg-10"> 
								<textarea type="text" class="form-control" id="dbqueryf" name="sqlexec" placeholder="Query">SELECT * FROM pages</textarea>
							</div>
						</div>
					</form>
				</div>
				<div class="list-group-item">
					<input type="submit" form="dbuform" class="btn btn-block btn-info" value="Send Query"/>
				</div>
			</div>
		</div>
	</div>
</div>	

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-reply fa-fw"></i> Response</h3>
		</div>
		<div class="panel-body">
			<div class="list-group">
				<div class="list-group-item">
					<p>[::SQL-Response::]<?php 
							if($response != null){
								while($row = mysql_fetch_array($response)){
									foreach($row as $elem){
										echo $elem;
									}
								}
							}
						?></p>
				</div>
			</div>
		</div>
	</div>
</div>	