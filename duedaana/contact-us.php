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
					<h2>Contact Us</h2>
					<?php
					$error = "";
					if(isset($_GET['error'])) {
						$error = explode("*", urldecode($_GET['error']));
						if(strtolower($error[1]) == "mail")
							$error = "<font color='red'>".base64_decode(str_replace(" ", "+", $error[0]))."</font>";
						else
							$error = "";
					}
					echo $error;
					?>
					<form name="contactform" method="post" action="page/contact.php">
						<table width="450px">
							<tr>
								<td valign="top">
									<label for="first_name">First Name *</label>
								</td>
								<td valign="top">
									<input  type="text" name="first_name" maxlength="50" size="30">
								</td>
							</tr>
							<tr>
								<td valign="top"">
									<label for="last_name">Last Name *</label>
								</td>
								<td valign="top">
									<input type="text" name="last_name" maxlength="50" size="30">
								</td>
							</tr>
							<tr>
								<td valign="top">
									<label for="email">Email Address *</label>
								</td>
								<td valign="top">
									<input type="text" name="email" maxlength="80" size="30">
								</td>
							</tr>
							<tr>
								<td valign="top">
									<label for="telephone">Telephone Number</label>
								</td>
								<td valign="top">
									<input type="text" name="telephone" maxlength="30" size="30">
								</td>
							</tr>
							<tr>
								<td valign="top">
									<label for="comments">Comments *</label>
								</td>
								<td valign="top">
									<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="text-align:center">
									<input type="submit" value="Submit">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<?php include_once "page/footer.txt"; ?>
	</body>
</html>
