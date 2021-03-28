<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Book Your Service';

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require('mysqli_connect.php'); // Connect to the db.

	$errors = []; // Initialize an error array.
   if (empty($_POST['booking'])) {
       $errors[] = 'Please choose your required service.';
    } else  {
        $s = mysqli_real_escape_string($dbc, trim($_POST['booking']));
    }

	// Check for a name:
	if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your name.';
	} else {
		$n = mysqli_real_escape_string($dbc, trim($_POST['name']));
	}

	
	// Check for an email address:
	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$a = mysqli_real_escape_string($dbc, trim($_POST['address']));
	}


    
    if (empty($_POST['postalcode'])) {
        $errors[] = 'Please enter your postal code.';
    } else {
        $po = mysqli_real_escape_string($dbc, trim($_POST['postalcode']));
    }
    
    if (empty($_POST['city'])) {
        $errors[] = 'Please enter your city.';
    } else {
        $ci = mysqli_real_escape_string($dbc, trim($_POST['city']));
    }
    
    if (empty($_POST['province'])) {
        $errors[] = 'Please enter your province.';
    } else {
        $p = mysqli_real_escape_string($dbc, trim($_POST['province']));
    }
    
    if (empty($_POST['contact'])) {
        $errors[] = 'Please enter your contact number.';
    } else {
        $c = mysqli_real_escape_string($dbc, trim($_POST['contact']));
    }
    
	if (empty($errors)) { // If everything's OK.

		// Register the user in the database...

		// Make the query:
		$q = "INSERT INTO book_service (booking, name, address, postalcode, city, province, contact) VALUES ('$s','$n', '$a','$po','$ci','$p','$c')";
		$r = @mysqli_query($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>Your Service Has been booked successully.</p><p><br></p>';

		} else { // If it did not run OK.

			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">Your Service cannot be booked. We apologize for any inconvenience.</p>';

			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

		} // End of if ($r) IF.

		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		
		exit();

	} else { // Report the errors.

		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p>';

	} // End of if (empty($errors)) IF.

	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>


<html>

<head>
<link rel= "stylesheet" type="text/css" href="style1.css">
</head>

<body>
<div class="header">

<h1>Book Your Service</h1>
</div>

<form action="service.php" method="post">

	<div class= "input-group">
	<label>Service</label>
	<select name = "booking">

		<option value = "HomeCleaning"> Home Cleaning</option>
		<option value = "MaidServices"> Maid Services </option>
		<option value = "AirductCleaning"> AirDuct Cleaning</option>
		<option value = "SnowRemoval"> Snow Removal</option>
		<option value = "BabySitting"> Baby Sitting</option>
		<option value = "MoveInMoveOutCleaning"> Move In and Move Out Cleaning</option>
	</select>

	</div>
	<div class = "input-group">
	<label> Name </label>
	<input type="text" name="name" size="20" maxlength="40" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">

	</div>
	<div class = "input-group">
		<label>Address</label>
		<input type="text" name="address" size="15" maxlength="40" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>">
	</div>

	<div class= "input-group">
	<label>Postal Code  </label>
	<input type="text" name="postalcode" size="20" maxlength="60" value="<?php if (isset($_POST['postalcode'])) echo $_POST['postalcode']; ?>" >
	</div>

	<div class = "input-group">
		<label> City </label>
		<input type="text" name="city" size="10" maxlength="20" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>" >
	</div>

	<div class = "input-group">
		<label>Province</label>
		<input type="text" name="province" size="10" maxlength="20" value="<?php if (isset($_POST['province'])) echo $_POST['province']; ?>" >
	</div>

	<div class = "input-group">
		<label> Contact</label>
		<input type="text" name="contact" size="10" maxlength="20" value="<?php if (isset($_POST['contact'])) echo $_POST['contact']; ?>" >
	</div>

	<div class= "input-group">
	<button type="submit" name="submit" class="btn" > Book Service </button>
	</div>
</form>

</html>