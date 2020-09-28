<!DOCTYPE html>
<html>
<head>
	<title>PLC CMS- Login</title>
	<link rel="stylesheet" type="text/css" href="adminCss/site.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700&display=swap" rel="stylesheet">
</head>
<body>
<div class="outter">
	<div class="wrapper" id="dashboard">
		<div class="leftsidebar" id="nav">
			<img id="cmslogo" src="imgs/cmslogo.png" alt="logo">
			<div id="acc"><img data-target="isminiing" id="hidden"src="imgs/hiddenicon.png" alt="hide"/></div>
			<div class="navbarblock" id="spec">
				<a href="index.php?controller=admin&action=dashboard"><div class="icon" id="dasha"></div><span>Dashboard</span></a>
			</div><!--end of navbarblock-->
			<div class="navbarblock">
				<a href="index.php?controller=admin&action=accommodations"><div class="icon" id="dashb"></div><span>Accommodations</span></a>
			</div><!--end of navbarblock-->
			<div class="navbarblock">
				<a href="index.php?controller=admin&action=type"><div class="icon" id="dashc"></div><span>Type</span></a>
			</div><!--end of navbarblock-->
		</div><!--end of leftsidebar-->
		
		<div class="rightsidebar">
			<div class="group">
				<div class="block" id="helpblock">
					<a href="#"><div class="icon" id="dashe"></div></a>
				</div><!--end of block-->	
				<div class="block" id="userblock">
					<a href="#"><div class="icon" id="dashf"><img src="imgs/star.png"/></div></a>
					<div class="subblock">
						<div class="tog">
							<div class="icon" id="dashg"></div><a href="#"><span>Profile</span></a>
						</div><!--end of tog-->	
						<div class="tog">
							<div class="icon" id="dashh"></div><a href="#"><span>Message</span></a>
						</div><!--end of tog-->	
						<div class="tog">
							<div class="icon" id="dashi"></div><a href="index.php?controller=admin&action=logout"><span>Logout</span></a>
						</div><!--end of tog-->	
					</div><!--end of subblock-->	
				</div><!--end of block-->	
			</div><!--end of group-->		
		</div><!--end of rightsidebar-->