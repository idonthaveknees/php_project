<?php
	require '../../vendor/autoload.php';
	
	function get_db(){
		$mongo= new MongoDB\Client("mongodb://localhost:27017/wai",
			[
				'username' => 'wai_web',
				'password' => 'w@i_w3b',
			]);
		$db = $mongo->wai;
		return $db;
	}
	
	function get_image_count(){
		$db = get_db();
		return $db->images->count();
	}
	
	function add_image($src, $title, $author) {
		$db = get_db();
		$image = [
			'title' => $title, 
			'author' => $author,
			'src' => $src
		];
		$db->images->insertOne($image);
	}
	
	function search() {
		$db = get_db();
		$images = $db->images->find();

		foreach ($images as $image) {
			echo $image['title'] . '<br />';
		}
	}

	function paging($page, $limit) {
		$db = get_db();

		$next  = ($page + 1);
		$prev  = ($page - 1);

		$opts = [
			'skip' => ($page - 1) * $limit,
			'limit' => $limit
		];
		
		$images = $db->images->find([], $opts);
		
		return $images;
	}
	
	function log_in($login, $password) {

		$db = get_db();
		$user = $db->users->findOne(["login" => $login]);
		
		$text = "";
		
		if(password_verify($password, $user['password'])) {
			$_SESSION['user'] = $user['login'];
			$_SESSION['loggedin'] = true;
			$text = "Logged in successfully.";
		}
		else if ($user === NULL) {
			$text = "User with such login does not exist.";
		}
		else {
			$text = "Incorrect password.";
		}
		return $text;
	}
	
	function check_registration_form($address, $login, $pass1, $pass2, &$text) {
		$db = get_db();
		
		$text = "";
		
		if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
			$text = "$address is not a valid email address";
			$true_password = NULL;
		}

		else if($pass1 !== $pass2) {
			$text = "Passwords don't match.";
			$true_password = NULL;
		}
		else if($db->users->findOne(["login" => $login])) {
			$text = "Someone already has that login, ya prick. Find another one.";
			$true_password = NULL;
		}
		else {
			$true_password = password_hash($pass1, PASSWORD_DEFAULT);
			$text = "Registered successfully.";
		}
		return $true_password;
	}

	function register_user($address, $login, $pass1, $pass2) {
		$db = get_db();
		
		$true_password = check_registration_form($address, $login, $pass1, $pass2, $text);
		
		if($true_password != NULL) {
			$user = [
				'address' => $address,
				'login' => $login, 
				'password' => $true_password,
			];
			$db->users->insertOne($user);
		}
		return $text;
	}

	function get_images_by_name($name){
        $db = get_db();
    
        $opts = [
            'title' => ['$regex' => $name, '$options' => 'i']
        ];
        
        $images = $db->images->find($opts);
        return $images;
    }
	
	function delete_images() {
		$db = get_db();
		$images = $db->images->find();
		foreach ($images as $image) {
			$db->images->deleteOne($image);
		}
	}
	
?>