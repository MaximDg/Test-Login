<?php require_once 'header.php'; ?>
<?php 
	$page =isset($_GET['page'])?$_GET['page']:'';
	switch ($page) {
		case 'profiles-all':
		case '':
			require_once 'pages/profiles-all.php';
			break;
		case 'my-profile':
			require_once 'pages/my-profile.php'; 
			break;
		case 'sign-up':
			require_once 'pages/sign-up.php';
			break;
		case 'login':
			require_once 'pages/login.php';
			break;	
	}
?>
<?php require_once 'footer.php'; ?>