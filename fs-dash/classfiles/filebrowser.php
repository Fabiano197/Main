<?php 

function fileBrowser($directory, $linkformat){
	
	?>
	
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-server fa-fw"></i> Server Options</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<span class="badge badge-success">Fixes Database-related errors</span>
						<i class="fa fa-fw fa-database"></i> Install CMS Databases
					</a>
					<a href="#" class="list-group-item">
						<span class="badge badge-info">Usually takes ~5 Minutes</span>
						<i class="fa fa-fw fa-refresh"></i> Reboot Server
					</a>
					<a href="#" class="list-group-item">
						<span class="badge badge-danger">Cannot be undone!</span>
						<i class="fa fa-fw fa-trash"></i> Uninstall Software
					</a>
				</div>
				<div class="text-right">
					<a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	
}
?>