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
<?php
// session_destroy();
?>
	<div class="login">
		<h2 class="login_h2">Login</h2>
	<?= form_open('/students/login', 'autocomplete="off"', 'class="login_form"'); ?>
			<label for="email" class="login_label">Email Address:</label>
			<input type="text" name="login_email" class="login_input" value="<?= set_value('login_email') ?>">
			<?= form_error('login_email') ?>
			<label for="password" class="login_label">Password:</label>
			<input type="password" name="login_password" class="login_input" value="<?= set_value('login_password') ?>">
			<?= form_error('login_password') ?>
			<input type="submit" name="login" value="Login" class="login_btn">
		</form>
	</div>

	<div class="register">
		<h2 class="reg_h2">Register</h2>
<?php	if($this->session->tempdata('success')) { ?>
		<p class="success"><?= $this->session->tempdata('success'); ?></p>
<?php	}	?>
	<?= form_open('/students/register', 'autocomplete="off"', 'class="reg_form"'); ?>
			<label for="first_name" class="reg_label">First Name:</label>
			<input type="text" name="first_name" class="reg_input" value="<?= set_value('first_name') ?>">
			<?= form_error('first_name') ?>
			<label for="last_name" class="reg_label">Last Name:</label>
			<input type="text" name="last_name" class="reg_input" value="<?= set_value('last_name') ?>">
			<?= form_error('last_name') ?>
			<label for="email" class="reg_label">Email Address:</label>
			<input type="text" name="email" class="reg_input" value="<?= set_value('email') ?>">
			<?= form_error('email') ?>
			<label for="password" class="reg_label">Password:</label>
			<input type="password" name="password" class="reg_input" value="<?= set_value('password') ?>">
			<?= form_error('password') ?>
			<label for="confirm" class="reg_label">Confirm Password:</label>
			<input type="password" name="confirm" class="reg_input" value="<?= set_value('confirm') ?>">
			<?= form_error('confirm') ?>
			<input type="submit" name="register" value="Register" class="reg_btn">
		</form>
	</div>
</body>
</html>