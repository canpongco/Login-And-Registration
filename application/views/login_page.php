<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Login and Registration</title>

	<link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico') ?>" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
	<div class="login_page">
		<h2 class="page_h2">Welcome <?= $student['first_name'] ?>!</h2>
		<a href="/students/logout" class="logoff_btn">Log off</a>
        <div class="login_info">
            <h4>First Name:</h4>
            <p><?= $student['first_name'] ?></p>
            <h4>Last Name:</h4>
            <p><?= $student['last_name'] ?></p>
            <h4>Email Address:</h4>
            <p><?= $student['email'] ?></p>
        </div>
	</div>
</body>
</html>