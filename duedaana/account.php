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
				<div class="panel">
					<h2>Account</h2>
					<form method="post" action="?action=update">
						<?php
							$error = "";
							if(isset($_GET['error'])) {
								$error = explode("*", urldecode($_GET['error']));
								if(strtolower($error[1]) == "update")
									$error = "<font color='red'>".base64_decode(str_replace(" ", "+", $error[0]))."</font>";
								else
									$error = "";
							}
							//if($account->doCheck()):
						?>
						<div>
							<p>Please setup a password and complete your credentials. After submitting, you will be able to log into the website.</p>
							Username:<br/>
							<input type="text" name="username"><br><br>
							Create a spassword:<br>
							<input type="password" name="password"><br/>
							<i>At lease eight characters with one uppercase letter, one lowercase letter, and one digit.</i><br><br>
							Re-enter the password:<br/>
							<input type="password" name="password"><br><br>
							<input type="submit" value="Submit"><br><?php echo $error; ?>
						</div>
						<?php //else: ?>
							Sorry, you must be logged in to access this page.
						<?php //endif; ?>
					</form>
				</div>
			</div>
		</div>
		<?php include_once "page/footer.txt"; ?>
	</body>
</html>