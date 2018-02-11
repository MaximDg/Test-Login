<?php
require_once 'connect.php';

function uploadFile($folderName, $file){

$f = isset($file)?$file:''; 	
if ($f['name'] != '') {
	$folder = $folderName;
	if(!file_exists($folder))
	{
		mkdir($folder);
	}
	$filename = time().' - '.rand(0,100).' - '.$f['name'];
	move_uploaded_file($f['tmp_name'], $folder.'/'.$filename);
}
else { $filename = ''; }

return $filename;
	
}

function registration(){

	$f = uploadFile('avatars',$_FILES['ava']);
	$email = strip_tags(trim($_POST['email']));
	$login = strip_tags(trim($_POST['name']));
	$secondName = strip_tags(trim($_POST['secondName']));
	$description = strip_tags(trim($_POST['description']));

	if ($f == '') {
		$file = 'avatars/no-ava.jpg';
	}
	else $file = 'avatars/'.strip_tags(trim($f));

	$dbEmail = db()->query('SELECT email FROM registration');
		while ($row = $dbEmail->fetch_object()) {
			if ($email == $row->email) {
				set_message('error', 'This email already exists!');
				return;
			}
		}
		set_message('success', 'Congratulations, you are registered!');			
	db()->query("INSERT INTO registration (name, second_name, email, description, file) VALUES ('{$login}', '{$secondName}', '{$email}', '{$description}', '{$file}')");

}

function login(){
	$name = strip_tags(trim($_POST['name']));
	$email =  strip_tags(trim($_POST['email']));
	$dbName = db()->query('SELECT name, email, file FROM registration');
	  	while ($row = $dbName->fetch_object()) {
	  		if ($row->name == $name && $row->email == $email) {
	  			session_start();
				$_SESSION['user'] = $row->name;
				$_SESSION['email'] = $row->email;
				$_SESSION['ava'] = $row->file;
				set_message('success', 'HELLO, '.$name.'!');
				header('Location: index.php');
				return true;
	  		}
		}
	set_message('error', 'Wrong name or Email!');
	return false;
}

function show_message(){
	if(isset($_SESSION['error'])): ?>
		<div class= "alert alert-danger"><?= $_SESSION['error']?></div>
	<?php 
	unset($_SESSION['error']);
	endif ?>

	<?php if(isset($_SESSION['success'])): ?>
		<div class= "alert alert-success"><?= $_SESSION['success']?></div>
	<?php 
	unset($_SESSION['success']);
	endif;
}

function set_message($type, $mes){
	$_SESSION[$type] = $mes;
}

function edit(){

	$f = uploadFile('avatars',$_FILES['ava']);
	$login = strip_tags(trim($_POST['name']));
	$secondName = strip_tags(trim($_POST['secondName']));
	$description = strip_tags(trim($_POST['description']));
	$id = ($_POST['id']);

	if ($f == '') {
		$file = 'avatars/no-ava.jpg';
	}
	else $file = 'avatars/'.strip_tags(trim($f));

		  		session_start();
				$_SESSION['user'] = $login;
				$_SESSION['ava'] = $file;

	set_message('success', 'Congratulations, your profile has been updated!');			

    db()->query("UPDATE registration SET name = '$login', second_name = '$secondName',  description = '$description', file = '$file' WHERE id = '$id'");
    header('Location: ?page=my-profile');
}
?>