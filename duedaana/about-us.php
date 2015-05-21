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
					<div class="coming-up panel">
						<h2>Search</h2>
						<form method="get" action="search.php">
							<input type="text" size="18" name="search">
							<input type="submit" value="Search">
						</form>
					</div>
				</div>
				<div class="content">
					<h2>About Us</h2>
					<img style="float: left; margin: 5px;" src="http://www.imagemagick.org/Usage/backgrounds/noise_noop.png" height="80" width="80">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque libero metus, accumsan non mollis sed, sollicitudin quis metus. Nullam in turpis fermentum, fringilla libero id, dapibus purus. Aliquam in sem dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue justo vitae commodo dapibus. Nam semper adipiscing dolor, eget tempor tellus luctus eget. Duis a nisi pulvinar, pretium quam eu, mattis urna. Phasellus egestas sapien leo, congue vehicula nibh porta vel. Vestibulum elit lectus, rutrum quis velit a, viverra fringilla nisi.<br><br>
					<img style="float: left; margin: 5px;" src="http://www.imagemagick.org/Usage/backgrounds/noise_noop.png" height="80" width="80">Nunc cursus accumsan mauris, quis pharetra sapien elementum id. Suspendisse fermentum nec lectus eu congue. Nulla tempus sagittis rutrum. Ut ipsum arcu, pulvinar sed sapien id, placerat placerat elit. Praesent consectetur sed libero eleifend aliquet. Duis justo lorem, gravida sit amet ipsum sit amet, interdum egestas magna. Nam ac magna et libero cursus lacinia ac vitae dolor. Donec vel metus pellentesque, ornare velit quis, cursus orci. Fusce dictum orci et dignissim scelerisque. Aliquam nec interdum tortor, at venenatis neque. Nulla purus justo, porttitor a rhoncus vel, euismod eget felis.					</div>
			</div>
		</div>
		<?php include_once "page/footer.txt"; ?>
	</body>
</html>