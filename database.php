<?php

// database.php file is used to connect to the database and table in my index.html as well as the two php files: login.php and logged_in.php

// These lines of code shows information that I need to locate and form the connection between the database and files
$servername = getenv('localhost:8888'); // This is the name of the server, of course MAMP uses 'localhost:8888'
$username = 'user'; // The username for the database is called 'user'
$password = 'account'; // The password for the database is called 'account'
$database = 'account_system'; // The name of the database is called 'account_system'
$dbport = 8888; // The port number of the database, which MAMP uses 8888

// I created a variable that holds all of the information above for reference
$db = new mysqli($servername, $username, $password, $database, $dbport);

// I test $db for a connection, if there is no connection then I will get an error which will print out onto the screen.
if ($db -> connect_error) {
	die("<p>Connection Failed " . $db -> connect_error . "</p>");
}

// However if I successfully connect to the database, then it will print out success on to the screen with the host information
echo ("<p>Connection Successful" . $db -> host_info . "</p>");

// This line of calls out these variables in order to establish a connection to the database
mysqli_select_db($db, $database);



?>