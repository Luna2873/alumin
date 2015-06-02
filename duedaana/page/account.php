<?php
class Account {

	public function __construct($get, $post) {
		session_start();
		$this->post = $post;
		$this->get = $get;
		$this->createDatabase();
		if(!isset($this->get['action']))
			return;
		switch(strtolower($this->get['action'])):
			case "logout":
				$this->logout();
				break;
			case "login":
				$this->login();
				break;
			case "update":
				$this->update();
				break;
			case "register":
				$this->register();
				break;
		endswitch;
	}

	public function login() {
		if(!isset($this->post['username']) || trim($this->post['username']) == "")
			$this->error("You must fill in the required username field to login.", "login");
		elseif(!isset($this->post['password']) || trim($this->post['password']) == "")
			$this->error("You haven't filled the password field, you cannot login!", "login");
		else {
			$username = $this->mysql->escape($this->post['username']);
			$password = $this->mysql->escape($this->post['password']);
			
			$query = $this->mysql->query("SELECT * FROM accounts WHERE username='".$this->mysql->escape($username)."' LIMIT 1");
			if($this->mysql->num($query) == 0) {
				$this->error("The username you entered does not match any of our records.", "login");
				return;
			}
			$row = $this->mysql->listArray($query);
			if(!password_verify($password, $row['password'])) {
				$this->error("Sorry the password you entered isn't correct with that username.", "login");
				return;
			}
			$session = md5(uniqid(microtime()) . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $username);
			$insert = $this->mysql->query("UPDATE accounts SET session_id='$session' WHERE username='$username'");
			$_SESSION['session_id'] = $session;
			$_SESSION['username'] = $username;
		}
	}
	
	public function update() {
		$keys = "";
		$values = "";
		$array = Array();
		if(!$this->doCheck()) {
			$this->error("<br>Account verification error, re-login and try again.", "update");
			return;
		}
		if(trim($this->post['graduation']) != "" && isset($this->post['graduation']))
			$array['graduation'] = $this->mysql->escape($this->post['graduation']);
		if(trim($this->post['email']) != "" && isset($this->post['email']) && $this->isValidEmail($this->post['email']))
			$array['email'] = $this->mysql->escape($this->post['email']);
		if(trim($this->post['phone']) != "" && isset($this->post['phone']))
			$array['phone'] = $this->mysql->escape($this->post['phone']);
		if(trim($this->post['password']) != "" && isset($this->post['password']))
			$array['graduation'] = hash_password($this->mysql->escape($this->post['password'], PASSWORD_DEFAULT));
		if(trim($this->post['resident']) != "" && isset($this->post['resident']))
			$array['resident'] = $this->mysql->escape($this->post['resident']);
		if(trim($this->post['city']) != "" && isset($this->post['city']))
			$array['city'] = $this->mysql->escape($this->post['city']);
		if(trim($this->post['stateorprovince']) != "" && isset($this->post['stateorprovince']))
			$array['stateorprovince'] = $this->mysql->escape($this->post['stateorprovince']);
		foreach($array as $key => $value) {
			$keys .= "$key='$value', ";
		}
		if($keys == "" || $array = Array()) {
			$this->error("<br>You didn't edit anything!", "update");
			return;
		}
		$keys = substr($keys, 0, -2);
		echo "UPDATE accounts SET $keys WHERE session_id='".$_SESSION['session_id']."'";
		$this->mysql->query("UPDATE accounts SET $keys WHERE session_id='".$_SESSION['session_id']."'");
		$this->error("</font><br><font color='green'>You successfully updated your account.</font>", "update");
	}
	
	public function isValidEmail($email){
		return filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
	}
	
	public function register() {
		if(!isset($this->post['username']) || trim($this->post['username']) == "")
			$this->error("You must fill in the required username field to register.", "register");
		elseif(!isset($this->post['password']) || trim($this->post['password']) == "")
			$this->error("You haven't filled the password field, you cannot register!", "register");
		elseif(!isset($this->post['first']) || trim($this->post['first']) == "")
			$this->error("You haven't filled your first name, you cannot register!", "register");
		elseif(!isset($this->post['last']) || trim($this->post['last']) == "")
			$this->error("You haven't filled your last name, you cannot register!", "register");
		elseif(!isset($this->post['graduation']) || trim($this->post['graduation']) == "")
			$this->error("You haven't filled in your class of graduation, you cannot register!", "register");
		elseif(!isset($this->post['email']) || trim($this->post['email']) == "" || !$this->isValidEmail($this->post['email']))
			$this->error("You haven't filled in your email correctly, you cannot register!", "register");
		elseif(!isset($this->post['city']) || trim($this->post['city']) == "")
			$this->error("You can't be in blank!", "register");
		elseif(!isset($this->post['stateorprovince']) || trim($this->post['stateorprovince']) == "")
			$this->error("You must fill state or province correctly.", "register");
		else {
			$name = $this->mysql->escape(trim($this->post['first'])." ".trim($this->post['middle'])." ".trim($this->post['last']));
			$username = $this->mysql->escape($this->post['username']);
			$password = password_hash($this->mysql->escape($this->post['password']), PASSWORD_DEFAULT);
			$email = $this->mysql->escape($this->post['email']);
			$phone = $this->mysql->escape($this->post['phone']);
			$graduation = $this->mysql->escape($this->post['graduation']);
			$resident = $this->mysql->escape($this->post['resident']);
			$city = $this->mysql->escape($this->post['city']);
			$sop = $this->mysql->escape($this->post['stateorprovince']);
			$query = $this->mysql->query("SELECT * FROM accounts WHERE username='$username' LIMIT 1");
			if($this->mysql->num($query) > 0) {
				$this->error("That username is taken.", "register");
				return false;
			}
			$query2 = $this->mysql->query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
			if($this->mysql->num($query2) > 0) {
				$this->error("You have already registered!", "register");
				return false;
			}
			$this->mysql->query("INSERT INTO `accounts`(`id`, `username`, `password`, `phone`, `name`, `email`, `graduation`, `stateorprovince`, `resident`, `city`, `session_id`) VALUES (NULL,'$username','$password','$phone','$name','$email','$graduation','$sop','$resident','$city','Has not logged in yet!')");
			$this->error("</font><font color='green'>You have been registered, ".$this->post['first']."!", "register");
		}
	}
	
	public function search() {
		$return = "<tr><td>Sorry, we have no results.</td><td></td><td></td>";
		if(!isset($this->get['search']) || trim($this->get['search']) == "")
			return $return;
		
		$keyword_tokens = explode(' ', $_GET['search']);

		$sql = "SELECT * FROM accounts WHERE name LIKE '%";
		$sql .= implode("%' or name LIKE '%", $keyword_tokens) . "%'";
		$records = $this->mysql->returnArray($sql);

		foreach($records as $record) {
			if($return == "<tr><td>Sorry, we have no results.</td><td></td><td></td>")
				$return = "";
			$name = explode(" ", $record['name']);
			$return .= "<tr><td>".$name[0]."</td><td>".$name[2]."</td><td>".$record['graduation']."</td></tr>";
		}
		return $return;
	}
	
	public function error($msg, $type) {
		header("Location: ?error=".urlencode(base64_encode($msg)."*".$type));
	}
	
	public function logout() {
		session_unset();
		session_destroy();
		$_SESSION = array();
		header("Location: index.php");
	}
	
	public function createDatabase() {
		// Change database configuration.
		//$this->mysql = new Database("localhost", "iamdbadmin", "gr8admin29", "duedaana_database1");
		//							Host	Username	Password	Database
		$this->mysql = new Database("localhost", "root", "123456", "duedaana_database1");
		// MySQL table data is in database.sql
	}

	public function doCheck() {
		if(isset($_SESSION['username']))
			if(isset($_SESSION['session_id'])) {
				
				$query = $this->mysql->query("SELECT * FROM accounts WHERE username='".$this->mysql->escape($_SESSION['username'])."' AND session_id='".$this->mysql->escape($_SESSION['session_id'])."'");
				$numerator = $this->mysql->num($query);
				
				return ($numerator == 1 ? true : false);
			} else
				return false;
		else
			return false;
	}
	
	public function getSide() {
		$error = "";
		if(isset($this->get['error'])) {
			$error = explode("*", urldecode($this->get['error']));
			if(strtolower($error[1]) == "login")
				$error = "<font color='red'>".base64_decode($error[0])."</font>";
			else
				$error = "";
		}
		if($this->doCheck())
			return "<h2>Account</h2>You are currently logged in. You can <a href='?action=logout'>logout</a> here!";
		return "
		<h2>Login</h2>
		Every wonder whaterver happended to your friends that you went to university with?</p>
		you can get connected with some of them here. Log in and you can search for your batch mates.</p>
		<form action='?action=login' method='post'>
		Username: <input name='username' type='text' style='width: 99%;''><br>
		<i class='tip'>Your email is your username</i>
		<p/>
		Password: <input name='password' type='text' style='width: 99%;'><br>
		<input type='submit' style='margin-top: 10px;' value='Go'>
		$error
		</form>
		<div class='center with-underline'>
			<a href='reset.php'>Forgot password?</a><br/>
			<a href='register.php'>Not registered?</a>
		</div>
		";
	}

}
class Database {

		private $mysqli;

		public function database($host, $user, $pass, $db) {
				$this->mysqli = new MySQLi($host, $user, $pass, $db);
		}
		public function listArray($query) {
				return mysqli_fetch_array($query, MYSQLI_BOTH);
		}
		public function query($string) {
				return mysqli_query($this->mysqli, $string);
		}
		public function escape($string) {
				return mysqli_real_escape_string($this->mysqli, $string);
		}
		public function num($query) {
				return mysqli_num_rows($query);
		}
		public function returnArray($query) {
				$result = $this->query($query);
				if (@mysqli_num_rows($result) != 0) {
						$arr = array();
						while ($row = @mysqli_fetch_assoc($result))
								$arr[] = $row;
						return $arr;
				} else
						return array();
		}
}
?>