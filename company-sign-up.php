<html>
<head>
	<title>Company Sign Up Page</title>
	<link href="assets/css/sign-up.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
	<div class="header">
		<h1><a href="index.php">KHADEMNI</a></h1>
	</div>
	<div class="container">
		<h1>Sign Up</h1>
		<form method="post">
			<label for="companyName">Company Name:</label>
			<input type="text" id="companyName" name="companyName" required>

			<label for="headName">Head Name:</label>
			<input type="text" id="headName" name="headName" required>

			<label for="address">Address:</label>
			<input type="text" id="address" name="address" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>

			<button type="submit" name="submit">Sign Up</button>
		</form>
	</div>
</body>
</html>
<?php
// Define database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "khademni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the company sign-up form has been submitted
if (isset($_POST['submit'])) {
    // Get form data and sanitize it
    $companyName = $_POST['companyName'];
    $headName = $_POST['headName'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    // Insert the data into the companies table
    $sql = "INSERT INTO companies (company_name, head_name, address, password) VALUES ('$companyName', '$headName', '$address', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("location: company-index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

