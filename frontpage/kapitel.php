<!DOCTYPE html>
<html>
	<?php include_once "build/header.php"?>
	<body>
		<?php include_once "build/topbar.php";?>
		<div id="wrapper">
			<?php include_once "build/sidebar.php"?>
			<div class="content">
				<div id="page-content-wrapper">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<?php
									if (empty($_GET)){include "content/html/404.html"; exit();}
									$kapitel = $_GET["kap"];
									$path = "content/html/" . $kapitel . ".php";
									if(file_exists($path)){
										include $path;
									}else{ 
										include "content/html/404.html";
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>