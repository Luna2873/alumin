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
					<style>
						.results {
							display: table;
							border-collapse: collapse;
						}
						.results tr:nth-child(odd) {
							background-color: #f1f1f1;
						}
						.results td {
							border: 1px solid #d4d4d4;
							padding: 5px;
							padding-top: 7px;
							padding-bottom: 7px;
							vertical-align: top;
						}
						.results th{
							color: #ffffff;
							background-color:#002150;
							border:1px solid #002150;
							padding:5px;
							vertical-align:top;
							text-align:left;
						}
					</style>
					<h2>Results</h2>
					<table class="results" spacing="none" style="width:100%">
						<tbody>
							<tr>
								<th>Firstname</th>
								<th>Lastname</th>		
								<th>Class of Graduation</th>
							</tr>
							<?php echo $account->search(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php include_once "page/footer.txt"; ?>
	</body>
</html>