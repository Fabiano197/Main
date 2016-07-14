<!DOCTYPE html>
<html lang="en">

<?php
	include_once("classfiles/message-template.php");
	include_once("classfiles/oshiri_tools.php");
	include_once("classfiles/dash-panels.php");
	include_once("classfiles/message_tools.php");
	include_once("classfiles/GETPOST.php");
	include_once("coldfuse_plugin_engine.php");
	include_once("classfiles/tasks_panel.php");
	include_once("classfiles/SQLquery.php");
	include_once("classfiles/pagebrowser.php");
	include_once("classfiles/userauth.php");
	include_once("classfiles/analytics.php");
	
	//[-------------------------------]
	//| 		system vars			  |
	//[-------------------------------]
	static $fsd_version = "3.01c";
	$userauth = new Userauth();
	
	//[-------------------------------]
	//| message notification varibles |
	//[-------------------------------]
	$message_comp_array = getMessages();
	
	$message_message_array = $message_comp_array["message"];
	$message_name_array = $message_comp_array["name"];
	$message_timestamp_array = $message_comp_array["timestamp"];
	$message_avatar_array = $message_comp_array["avatar"];
	$messages_count = sizeof($message_message_array);
	
	$message_alerts = array(array("Welcome!", "Info", "info"), array("New version avaiable", "3.4.4", "warning"), array("Update crucial!", "Reminder", "danger"));
	
	//[-------------------------------]
	//| message notification varibles |
	//[-------------------------------]
	$standart_email_manager_URI = "http://mail.google.com";
	$basefileURI = getBaseAddress()."/";
	
	//$username = "socketdown";
	
	//[-----------------------------]
	//| Page headings & subheadings |
	//[-----------------------------]
	$pageid_pagenames = array( "dashboard" => "Dashboard",
								"settings" => "Settings",
								"mediaman" => "Media Manager",
								"pagedit" => "Pages",
								"plugins" => "Plugins",
								"fedit" => "File Editor",
								"db" => "Database",
								"profile" => "Profile",
								"comments" => "Comments");
	$pageid_pagedescription = array( "dashboard" => "Overview",
									"settings" => "Change FSD3's appearance!",
									"mediaman" => "View uploaded media",
									"pagedit" => "Do you need to write another article?",
									"plugins" => "Add more features to FSD3!",
									"fedit" => 'Are you sure you want to change system files? <span class="label label-pill label-danger">Danger</span>',
									"db" => "View and modify the database!",
									"profile" => "Edit profile of ".$username,
									"comments" => "Interact with your audience");
	
	//[-----------------------------]
	//| 		BadgeVars		 	|
	//[-----------------------------]
	$badge_newtasks_count = 0;
	
	//pages count
	
	$query_pag = "select * from pages";
	$result_pag = sqlquery($query_pag);
	$badge_total_pages_count = mysql_num_rows($result_pag);
	
	$badge_fds_version_no = $fsd_version;
	
	//[-----------------------------]
	//| 	Menubar-Generation	 	|
	//[-----------------------------]
	$menubar_forwardings = array("dashboard", "pagedit", "settings", "plugins", "db");
	$menubar_pagenames = $pageid_pagenames;
	$menubar_icons = array( "dashboard" => "dashboard",
							"settings" => "gear",
							"pagedit" => "file",
							"plugins" => "plug",
							"db" => "database");
	$menubar_section_advanced = array( "dashboard" => 0,
										"settings" => 0,
										"pagedit" => 0,
										"plugins" => 1,
										"db" => 1);
	$menubar_active_index = handleMenuExceptions(getArrayOcurrencies($pageid, $menubar_forwardings))[0];
	
	//[-----------------------------]
	//|			Authentication		|
	//[-----------------------------]
	
	if(isset($_POST["password"]) == true) $authkey = $userauth->genAuthKey($username, $password);
	
	if(strlen($uuid) < 10){
		$uuid = $userauth->getID($username, $password);
	}
	
	if($userauth->checkAuthKey($authkey, $uuid) != 1){
		redirect($basefileURI."login.php?error=invalid-key");
	}
	if($userauth->getPermission($uuid) < 3){
		redirect($basefileURI."login.php?error=access-denied");
	}
	
	$credentials = "?uuid=".$uuid."&token=".$authkey."&user=".$username;
	
	//[-----------------------------]
	//|		Plugin Engine Fireup	|
	//[-----------------------------]
	
	$cfpms = new Coldfuse();
	$cfpms->loadmem();
	
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freestyle Dashboard 3</title>
	
	<?php include_once("classfiles/favicon.php"); ?>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $basefileURI.$credentials; ?>">Freestyle Dash <?php echo substr($fsd_version, 0, 1); ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
						<?php 
						
						//message-previews	
						
						for($messageno = 0; $messageno < $messages_count; $messageno++){
							
							message_preview($message_name_array[$messageno], $message_timestamp_array[$messageno], $message_message_array[$messageno], $message_avatar_array[$messageno]);
							
						}
						
						?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
						
						<?php
							//message_alert("Welcome!", "Info", "info");
							
							for($i = 0; $i < sizeof($message_alerts); $i++){
								message_alert($message_alerts[$i][0], $message_alerts[$i][1], $message_alerts[$i][2]);
							}
						?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $basefileURI.$credentials."&pageid=profile"; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo $standart_email_manager_URI; ?>"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="<?php echo $basefileURI.$credentials."&pageid=settings"; ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $basefileURI; ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				<?php
				
				for($nav_element = 0; $nav_element < sizeof($menubar_forwardings); $nav_element++){
					
					$pagename = $menubar_pagenames[$menubar_forwardings[$nav_element]];
					$page_fwd = $menubar_forwardings[$nav_element];
					$page_icon = $menubar_icons[$menubar_forwardings[$nav_element]];
					$isactive = "";
					if($menubar_active_index == $nav_element) $isactive = ' class="active"';
					
					if($menubar_section_advanced[$menubar_forwardings[$nav_element]] == 0){
						echo '
							<li'.$isactive.'>
								<a href="'.$basefileURI.$credentials."&pageid=".$page_fwd.'"><i class="fa fa-fw fa-'.$page_icon.'"></i> '.$pagename.'</a>
							</li>';
					}
				}
				
				echo '<li>
						<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-exclamation-triangle"></i> Advanced <i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="demo" class="collapse">';
						
				for($nav_element = 0; $nav_element < sizeof($menubar_forwardings); $nav_element++){
					
					$pagename = $menubar_pagenames[$menubar_forwardings[$nav_element]];
					$page_fwd = $menubar_forwardings[$nav_element];
					$page_icon = $menubar_icons[$menubar_forwardings[$nav_element]];
					$isactive = "";
					if($menubar_active_index == $nav_element) $isactive = ' class="active"';
					
					if($menubar_section_advanced[$menubar_forwardings[$nav_element]] == 1){
						echo '
							<li'.$isactive.'>
								<a href="'.$basefileURI.$credentials."&pageid=".$page_fwd.'"><i class="fa fa-fw fa-'.$page_icon.'"></i> '.$pagename.'</a>
							</li>';
					}
				}
							
				echo '
						</ul>
					</li>';
				
				?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $pageid_pagenames[$pageid]." <small>".$pageid_pagedescription[$pageid]."</small>"; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-<?php echo $menubar_icons[$pageid]; ?>"></i> <?php echo $menubar_pagenames[$pageid]; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <?php echo "<strong>Welcome, ".$username."!</strong> You are running version ".$badge_fds_version_no." of Freestyle Dash!"; ?>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
				
				<?php
				
				switch($pageid){
					case "dashboard":
					include("classfiles/pagefiles/badges.php");
					break;
					
					default:
					//include("classfiles/pagefiles/".$pageid.".php");
					break;
					
				}
				
				?>
                <!-- /.row -->
				
				<div class="row">
				
					<?php 
						if(strcmp($pageid, "dashboard") == 0) $i = 0;
						else if(strcmp($pageid, "pagedit") == 0){
							pageBrowser();
							echo '
							<div class="col-lg-12">
								<textarea id="editor" name="editor" form="npform"></textarea>
							</div>';
						}
						else if(strcmp($pageid, "settings") == 0) include("classfiles/settings_panel.php");
					
						if(strcmp($pageid, "db") == 0){
							
							$response = null;
							
							if(isset($_POST["sqlexec"])){
								
								$response = sqlquery($_POST["sqlexec"]);
							}
								include("classfiles/queryExec.php");
						}
						
						if(strcmp($pageid, "plugins") == 0){
							?>
							
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title pull-left"><i class="fa fa-plug fa-fw"></i> Plugins</h3>
											<p class="pull-right text-info"><i class="fa fa-info-circle fa-fw"></i>Put plugins into the '/fs-dash/plugins' folder. They will be loaded automatically.</p>
											<div class="clearfix"></div>
										</div>
										<div class="panel-body">
											<div class="list-group">
											<?php 
											foreach($cfpms->listLoaded() as $plugin){
											?>
												<p><i class="fa fa-expand fa-fw"></i> <?php echo $plugin; ?></p>
											<?php
											}
											?>
											</div>
										</div>
									</div>
								</div>

							
							<?php
						}
						
						if(strcmp($pageid, "profile")==0) include("classfiles/profile.php");
							
							?>
				
				</div>
				
                <!-- /.row -->
				
				<div class="row">
				
				<?php
				
				if(strcmp($pageid, "pagedit") == 0){
					echo '
							<div class="col-lg-12">
							<form id="npform" action="cnp.php'.$credentials.'" method="post">
							<input class="btn btn-block" type="submit" value="Create Page" id="npage_submit"></input>
							</form>
							</div>';
				}
				
				?>
				
				</div>
				
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	<script src="core-items/ckeditor/ckeditor.js"></script>
	<script src="core-items/ckeditor/config.js"></script>
	
	<script>
	
	var edElem = document.getElementById('editor');
	
	CKEDITOR.editorConfig = function( config ) {
		config.extraPlugins = 'imagebrowser';
		config.uiColor = '#AADC6E';
	};
	
	if(edElem != null){
		CKEDITOR.replace('editor');
	}
	
	function loadEditorialContent(index){
		if(contentArray != null){
			CKEDITOR.instances.editor.setData(contentArray[index]);
			document.getElementById("npform").innerHTML = '<input class="btn btn-block" type="submit" value="Create Page" id="npage_submit"><input style="display:none;" type="text" name="pagename" value="'+pagenameArray[index]+'"></input>'+
			'<input type="text" id="fpid_placehold" style="display:none;" value="'+fpidArray[index]+'" form="npform" name="fpid"></input>';
		}
	}
	
	function newpage(item){
		document.getElementById(item).innerHTML = '<p class="list-group-item"><i class="fa fa-fw fa-file-text-o"></i> Pagename: <input type="text" form="npform" name="pagename"></input> </p>';
		document.getElementById("npform").innerHTML = '<input class="btn btn-block" type="submit" value="Create Page" id="npage_submit">';
		$("#control_addpage").hide();
	}
	
	function delPage(page){
		window.location.href = '<?php echo $basefileURI; ?>delp.php<?php echo $credentials?>&pageid='+page;
	}
	</script>
	
	<style>
	.badge-danger {
		background-color: #d43f3a;
	}
	.badge-warning {
		background-color: #d58512;
	}

	.badge-success {
		background-color: #398439;
	}

	.badge-info {
		background-color: #269abc;
	}

	.badge-inverse {
		background-color: #333333;
	}
	</style>

</body>

</html>
