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
					<div class="panel">
						<h2>Account</h2><br>
						<form method="post" action="?action=update">
							<script>
								function handleStateOrProvince(value) {
									var element = document.getElementById("label");
									if(value=="CANADA")
										element.innerHTML = "Province:";
									else
										element.innerHTML = "State:";
								}
							</script>
							<?php
							$error = "";
							if(isset($_GET['error'])) {
								$error = explode("*", urldecode($_GET['error']));
								if(strtolower($error[1]) == "update")
									$error = "<font color='red'>".base64_decode(str_replace(" ", "+", $error[0]))."</font>";
								else
									$error = "";
							}
							if($account->doCheck()):
							?>
							<div style="float: left;">
							Class of graduation:<Br><input type="text" name="graduation"><br><br>
							Email:<br><input type="email" name="email"><br><br>
							Phone Number:<br><input type="tel" name="phone"><br><br>
							House Number:<br><input type="number" name="house"><br><br>
							<input type="submit" value="Update"><br><?php echo $error; ?></div>
							<div style="float: right; margin-right: 180px;">
							Password:<br><input type="password" name="password"><br><br>
							Resident of:<br>
							<select onchange="handleStateOrProvince(this.value)" name="resident">
								<option value="USA">USA</option>
								<option value="CANADA">CANADA</option>
							</select><br><br>
							City:<br><input type="text" name="city"><br><br>
							<label id="label">State:</label><br><input type="text" name="stateorprovince"><br><br></div>
							<?php else: ?>
							Sorry, you must be logged in to access this page.
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php include_once "page/footer.txt"; ?>
	</body>
</html>