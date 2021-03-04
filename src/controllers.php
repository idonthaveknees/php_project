<?php
	require_once 'business.php';
	
	function index(&$model) {
		global $db;
		$db = get_db();
		
		$limit = 4;
		$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$total = get_image_count();
		$images = paging($page, $limit);
		
		$model['page'] = $page;
		$model['total'] = $total;
		$model['images'] = $images;
		$model['limit'] = $limit;
		
		//$saved_images = $_SESSION['saved_images'];
		//if (!isset($saved_images)) {
		//		$saved_images = [];
		//}
		return 'index_view';
	}
	
	function upload(&$model) {
		$file = $_FILES['image'];
		$title = $_POST['title'];
		$author = $_POST['title'];
		$text = $_POST['watermark'];
		
		$upload_dir = 'static/images/';
		$thumbnails_path = 'static/thumbnails/';
		$file_name = basename($file['name']);
		$target = $upload_dir . $file_name;
		$tmp_path = $file['tmp_name'];
		$imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
		
		$text1 = '';
	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			if(filesize($tmp_path) > 1000000) {
				$text1 = 'Everything is wrong - format, size... Have you even checked what you want to send or have you just clicked whatever??';
			}
			else
				$text1 = 'Incorrect file format.';
		}
		else if(filesize($tmp_path) > 1000000) {
			$text1 = 'File too big.';
		}
		else {
			if(move_uploaded_file($tmp_path, $target)) {
				add_image($file_name, $title, $author);
				search();
				$text1 = "Upload done correctly!\n";
			}
		}

		switch ($imageFileType) {
			case 'jpg':
				$image = imagecreatefromjpeg($target);
				$image_name = chop($file_name, ".jpg");
				$thmb_name = $image_name . ".jpg";
				$tmp_image = imagecreatetruecolor( 125, 200 );
				imagecopyresized( $tmp_image, $image, 0, 0, 0, 0, 125, 200, imagesx($image), imagesy($image) );
				imagejpeg( $tmp_image, "{$thumbnails_path}{$thmb_name}" );
				break;
			case 'png':
				$image = imagecreatefrompng($target);
				$image_name = chop($file_name, ".png");
				$thmb_name = $image_name . ".png";
				$tmp_image = imagecreatetruecolor( 125, 200 );
				imagecopyresized( $tmp_image, $image, 0, 0, 0, 0, 125, 200, imagesx($image), imagesy($image) );
				imagepng( $tmp_image, "{$thumbnails_path}{$thmb_name}" );
				break;
			default:
				$image = false;
				break;
		}
		
		$text2 = '';
		if($image == false) 
			$text2 = 'WHAT THE HECK IS GOING ON HERE';
		else {
			$textcolor = imagecolorallocate($image, 255, 255, 255);
			$font = '/var/www/dev/src/web/static/hazelgrace.ttf';
			imagettftext($image, 20, 0, 20, 20, $textcolor, $font, $text);
			switch ($imageFileType) {
				case 'jpg':
					case 'jpeg':
					$save = '/var/www/dev/src/web/static/watermarked_images/'.$image_name.".jpg";
					break;
				case 'png':
					$save = '/var/www/dev/src/web/static/watermarked_images/'.$image_name.".png";
					break;
				default:
					$image = false;
					break;
			}
			imagepng($image, $save);
			imagedestroy($image);
		}
		
		$model['text'] = $text1;
		$model['text2'] = $text2;
		
		return 'upload_view';
	}
	
	function contact(&$model) {
		return 'contact_view';
	}
	
	function login(&$model) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		$text = log_in($login, $password);
		$model['text'] = $text;
		return 'login_view';
	}
	
	function register(&$model) {
		$address = $_POST['address'];
		$login = $_POST['login'];
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];
		
		$text = register_user($address, $login, $pass1, $pass2);
		
		$model['text'] = $text;
		
		return 'register_view';
	}
	
	function logout(&$model) {
		session_destroy();
        $_SESSION = [];

        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
                  $params["path"], $params["domain"],
                  $params["secure"], $params["httponly"]);
				  
		$text = "Logged out successfully.";
		$model['text'] = $text;
		return 'logout_view';
	}
	
	function saved_gallery(&$model) {
		global $db;
		$db = get_db();
		
		foreach($images as $index=>$image) {
			$checkbx = "checkbox_".$image['_id'];
			if(isset($_POST[$checkbx])) {
				$_SESSION['saved_images'][] = [
					'_id' => $image['_id'],
					's_src' => $image['src']
				];
			}
		
			/*if(isset($_SESSION['saved_images'])) {
				if($image['_id'] === $_SESSION['saved_images'][$index]->_id) {
					$checkbx->checked="checked";
				}
			}*/
		}
		
		return 'saved_gallery_view';
	}
	
	function search_gallery(&$model) {
		global $db;
		$db = get_db();
		
		return 'search_gallery_view';
	}
	
	function ajax(&$model) {
		
		$name = $_GET['name'];
		$images = get_images_by_name($name);
		
		$model['images'] = $images;
		return 'ajax_view';
	}
?>