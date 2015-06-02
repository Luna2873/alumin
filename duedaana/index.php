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
	</head>
	<body>
		<div id="wrapper">
			<?php include_once "page/header.txt"; ?>
			<div id="body">
				<div class="right-side">
					<div class="coming-up panel">
						<?php echo $account->getSide(); ?>
					</div>
				</div>
				<div class="content">
					<div class="slideshow">
						<div class="cycle">
							<div class="slide">
								<a href="#any url can go here">
									<img alt="" src="http://www.athleat.co.uk/user/Grass_back.jpg">
								</a>
							</div>
							<div class="slide">
								<a href="#any url can go here">
									<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2WvmIwTamGFIg4O4dYKVePoBkujRdfzKLTCX6OJc67HLr2z5t">
								</a>
							</div>
							<div class="slide">
								<a href="#any url can go here">
									<img alt="" src="http://www.joomlaworks.net/images/demos/galleries/abstract/7.jpg">
								</a>
							</div>
							<div class="slide">
								<a href="#any url can go here">
									<img alt="" src="http://chakracenter.files.wordpress.com/2013/02/nature1.jpg">
								</a>
							</div>
						</div>
						<div class="slideshow-controls"><a href="#" class="activeSlide"></a></div>
					</div>
					<div>
						<p>Our years spent studying at Economics department of university of Dhaka, has been the happiest for a lot of us. 
							Through classes, exams, halls, on campus activities, life changing experiences and all, we built some time tested friendships. 
							Post-graduation, we dispersed in various personal pursuit. 
							Many are in North America. DUEDAA, North America offers all of them a unique opportunity to re-connect with each other and the department.</p>
					</div>
				</div>
			</div>
		</div>
		<?php include_once "page/footer.txt"; ?>
	</body>
</html>