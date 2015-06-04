<?php
error_reporting(E_ALL);
include_once "page/account.php";
$account = new Account($_GET, $_POST);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>DUEDAA, North America</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="wrapper">
			<?php include_once "page/header.txt"; ?>
			<div id="body">
				<div >
					<div class="panel">
						<h2>Register</h2>
                        <i>If you have completed at least one semester or equivalent at the department of Economics, you are eligible to register</i>
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
							<div>
                                <ul class="horizontal-list">
                                    <li>
                                        <font color="red">* </font>Last name:<br>
                                        <input type="text" size="20" name="last"><br>
                                        <i>If you have two last names,<br/> enter it like: Ali-Khan</i>
                                    </li>
                                    <li>
                                        <font color="red">* </font>First name:<br>
                                        <input type="text" size="20" name="first">
                                    </li>
                                    <li>
                                        Middle name:<br>
                                        <input type="text" size="20" name="middle">
                                    </li>
                                </ul>
                                <ul class="horizontal-list">
                                    <li>
                                       <font color="red">* </font>Email:<br>
                                        <input type="email" name="email">
                                    </li>
                                    <li>
                                        <font color="red">* </font>Resident of:<br>
                                        <select onchange="handleStateOrProvince(this.value)" name="stateorprovince">
                                            <option value="USA">USA</option>
                                            <option value="CANADA">CANADA</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="horizontal-list">
                                    <li>
                                        <font color="red">* </font>Class of:<br>
                                        <input type="text" name="graduation"><br/>
                                        <i>Please ignore session jams</i>
                                    </li>
                                </ul>
                                <ul class="horizontal-list">
                                    <li>
                                        <input type="submit" name="register" value="Register">
                                    </li>
                                </ul>
                            </div>
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