<?php
error_reporting(E_ALL);
include_once "page/account.php";
$account = new Account($_GET, $_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>DUEDAA, North America</title>
		<link rel="stylesheet" href="style.css" />
		<!-- Add fancyBox main JS and CSS files -->
		<link rel="stylesheet" type="text/css" href="js/source/jquery.fancybox.css" media="screen" />
	
	</head>
	<body>
		<div id="wrapper" ng-app="myApp" ng-controller="galleryController">
			<?php include_once "page/header.txt"; ?>
			<div id="body">
				<h2>Gallery</h2>
				<div class="right-side">
					<div class="panel">
						<h3>Gallery</h3>
						DUEDAA, NA get together
						<ul>
							<li><a href="#" ng-click="myFilter = {batch: 1996}">Batch of 1996 reunion</a></li>
							<li><a href="#" ng-click="myFilter = {batch: 2005}">Batch of 2005 reunion</a></li>
						</ul>

					</div>
				</div>		
				<div  class="content">
					<div class="fancybox-w" data-ng-repeat="image in images | filter:myFilter">
             			<a class="fancybox" rel="gallery1" ng-href="{{image.href}}" title="{{image.title}}"><img data-ng-src="{{image.src}}"></a>
       				</div>
       			</div>
		</div>
		<?php include_once "page/footer.txt"; ?>
		<script type="text/javascript" src="js/source/jquery.fancybox.js"></script>
		<script type="text/javascript" src="js/assist.js"></script>
	</body>
</html>