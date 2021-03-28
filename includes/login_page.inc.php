<?php 
require('mysqli_connect.php');
$page_title = 'Login';


// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br>';
	foreach ($errors as $msg) {
		echo " - $msg<br>\n";
	}
	echo '</p><p>Please try again.</p>';
}

// Display the form:

?>
<html>
<head>
<link rel= "stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class= "header">
<h1>Login</h1>
</div>

<form action="login.php" method="post">

<div class= "input-group">
	<label>Email Address</label> <input type="email" name="email" size="20" maxlength="60"> </p>
	</div>

	<div class= "input-group">
	<label>Password</label>
	<p> <input type="password" name="pass" size="20" maxlength="20"></p>
	</div>

	<div class= "input-group">
	<button type="submit" name="submit" class= "btn" >Login</button>
	</div>
</form>

</body>

</html>




