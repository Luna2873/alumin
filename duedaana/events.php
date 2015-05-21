<?php
error_reporting(E_ALL);
include_once "page/account.php";
$account = new Account($_GET, $_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>DUEDAA, North America</title>
		<style>
			body {
				font: 14px/1.3 arial, sans-serif;
				margin: 0px;
				padding: 0px;
				font-weight: normal;
				color: #333;
				background: transparent url(img/bg_header.png) repeat-x;
			}
			#header .searchbox {
				position: absolute;
				right: 0;
				top: 48px;
				font-size: 11px;
			}
			ol, ul {
				list-style: none;
			}
			#nav li {
				float: left;
				width: 140px;
				background: transparent url(img/nav_divider.png) no-repeat left center;
				padding: 1px 0;
			}
			#nav li:first-child {
				background: none;
			}
			#wrapper {
				width: 980px;
				margin: 0 auto;
			}
			#header {
				height: 119px;
				position: relative;
			}
			#nav {
				height: 42px;
				margin-top: -26px;
			}
			#nav ul li a {
				display: block;
				font-size: 13px;
				font-weight: bold;
				padding: 3px 3px;
				text-align: center;
				height: 34px;
			}
			a {
				text-decoration: none;
				color: #002150;
				outline: 0;
			}
			#nav li:hover {
				background-image: none;
			}
			#nav li:hover + li, #nav li:active + li {
				background-image: none;
			}
			#nav li:hover a, #nav li:active a {
				background: #a4c0d6 url(img/nav_active.png) repeat-x;
				color:white;
			}
			#header .logo a {
				display: block;
				width: 213px;
				height: 68px;
				padding: 5px;
				text-indent: -9999px;
				margin-left: 109px;
			}
			#header, #header a {
				color: white;
				font-size: 12px;
			
			}
			.content {
				float: right;
				width: 710px;
			}
			.slideshow {
				background-color: #ececec;
				border: 9px solid #ececec;
				overflow: hidden;
				margin-bottom: 20px;
				position: relative;
			}
			.panel {
				background-color: #ececec;
				padding: 20px;
				margin-bottom: 20px;
				font-size: 13px;
				overflow: hidden;
			}
			.panel h2 {
				font-family: arial;
				font-size: 18px;
				font-weight: bold;
				color: #505050;
				padding: 0px;
				padding-bottom: 8px;
				margin: 0px;
			}
			* {
				margin: none;
				padding: none;
			}
			#header .nav li + li {
				padding-left: 24px;
			}
			#header .nav ul {
				text-align: right;
				padding-top: 7px;
				line-height: 14px;
				font-weight: bold;
			}
			#header .nav li {
				display: inline;
			}
			#body {
				overflow: hidden;
				padding-bottom: 40px;
				margin-top: 20px;
			}
			.right-side {
				float: left;
				margin-right: 20px;
				width: 250px;
				min-height: 100px;
			}
			.coming-up ul {
				padding: 5px 0;
				color: #333;
			}
			.coming-up .category {
				font-weight: bold;
				font-size: 12px;
				line-height: 12px;
				text-transform: uppercase;
			}
			.coming-up li {
				padding-bottom: 15px;
			}
			.coming-up h3 {
				font-size: 13px;
				padding: 4px 0;
			}
			#header .logo {
				margin-top: -25px;
				margin-left: 118px;
			}
			.header-text {
				margin-top: -35px;
				margin-left: 218px;
			}
			.header-text #top {
				position: absolute;
				top: 20px;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<?php include_once "page/header.txt"; ?>
			<div id="body">
				<div class="right-side">
					<div class="coming-up panel">
						<?php echo $account->getSide(); ?>
					</div>
					<div class="coming-up panel">
						<h2>Search</h2>
						<form method="get" action="search.php">
							<input type="text" size="18" name="search">
							<input type="submit" value="Search">
						</form>
					</div>
				</div>
				<div class="content">
					<h2>Events</h2>
					Donec in urna quis risus iaculis ullamcorper. Nullam lectus neque, mattis sit amet ipsum vel, facilisis vehicula risus. Nulla ac nisl vestibulum, facilisis neque sit amet, pellentesque nulla. Donec dapibus nisi massa, in eleifend urna luctus at. Nam sagittis sed lectus et dignissim. In at dapibus ante. Quisque luctus nisl enim, at porttitor orci pellentesque sodales. Sed ac sem dui. Donec commodo ornare lectus.<br><Br>
Proin consectetur non enim at viverra. Vivamus sagittis urna in volutpat cursus. Sed id turpis ut turpis tincidunt dignissim. Nulla vitae scelerisque felis. Praesent at gravida nisi, vel ullamcorper elit. Nunc sapien odio, laoreet id diam a, ullamcorper dignissim sapien. Suspendisse vitae imperdiet libero. Fusce arcu nulla, scelerisque in nunc vel, dignissim bibendum mauris. Aenean placerat interdum venenatis. Aenean dignissim nisl ac dolor imperdiet tincidunt. Suspendisse dictum faucibus nibh, sed rutrum orci elementum ac. Integer augue diam, tempus ut libero ac, pulvinar mattis mauris. Suspendisse vel massa nisi.
				</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>