<!DOCTYPE html>
<html lang="en">
<head>
	<title>Account System</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php include_once "database.php"; ?>

<div class="main">

<h1>You are logged in!</h1>
<p><a href="index.html">Home Page</a></p>

<?php

	// I created two variables to store the values inputted by the user back in the 'index.html' page using these attributes
	$username = $_POST['username'];
	$password = $_POST['password'];

	// I created a variable called '$account_insert' which runs an SQL query which will insert the values from above into the appropriate columns in my 'account' table
	$account_insert = "INSERT INTO account (username, password)VALUES ('$username', '$password')";

	// This line of code tests to see if the database connection and value insertion was successful which will print onto the screen either a success or fail message.
	if (mysqli_query($db, $account_insert)) {
		print_r("<p>Success: User added to the database</p>");
	} else {
		print_r("<p>Error: User wasn't able to connect to the database" . mysqli_error($db));
	}


	// I created a variable called '$sql' which will run an SQL query that selects each column from my 'account' table
	$sql = "SELECT id, username, password FROM account";

	// I created a variable called 'accountResult' that will run a connection to my database and run the SQL query above
	$accountResult = $db -> query($sql);

	// I use an if conditional to detect if there are more than 0 rows in my account table.  If there are more than 0, then it will run the while loop that I created.  However, if there are 0 or less rows, then you will get the message "No accounts have been entered"
	if ($accountResult -> num_row > 0) {
		// These lines of code will print to the screen the number of rows in my account_system database in HTML form
		while ($row = $accountResult -> fetch_assoc()) {
			echo "<hr>" . $row["id"] . "<p>Username: " . $row["username"] . "</p><p>Password: " . $row["password"] . "</p>";
		}
			} 
			
	// This line of code closes the connection to the database for security reasons
	$db -> close();

?>

</div>
</body>
</html>