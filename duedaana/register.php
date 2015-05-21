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
						<h2>Register</h2><br>
						<form method="post" action="?action=register">
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
								if(strtolower($error[1]) == "register")
									$error = "<font color='red'>".base64_decode(str_replace(" ", "+", $error[0]))."</font>";
								else
									$error = "";
							}
							if(!$account->doCheck()):
							?>
							<div style="float: left;">
							<font color="red">* </font>Name:<br><input type="text" size="4" name="first" placeholder="First">
							<input type="text" size="4" name="middle" placeholder="Middle">
							<input type="text" size="4" name="last" placeholder="Last"><br><br>
							<font color="red">* </font>Class of graduation:<Br><input type="text" name="graduation"><br><br>
							<font color="red">* </font>Email:<br><input type="email" name="email"><br><br>
							<font color="red">* </font>Username:<br><input type="text" name="username"><br><br>
							<font color="red">* </font>Phone Number:<br><input type="tel" name="phone"><br><br>
							<input type="submit" value="Register"><br><?php echo $error; ?></div>
							<div style="float: right; margin-right: 180px;">
							<font color="red">* </font>House Number:<br><input type="number" name="house"><br><br>
							<font color="red">* </font>Password:<br><input type="password" name="password"><br><br>
							<font color="red">* </font>Resident of:<br>
							<select onchange="handleStateOrProvince(this.value)" name="resident">
								<option value="USA">USA</option>
								<option value="CANADA">CANADA</option>
							</select><br><br>
							<font color="red">* </font>City:<br><input type="text" name="city"><br><br>
							<font color="red">* </font><label id="label">State:</label><br><input type="text" name="stateorprovince"><br><br></div>
							<?php else: ?>
							You are already registered. Please login.
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php include_once "page/footer.txt"; ?>
	</body>
</html>