<?php
	if(isset($_POST['submit'])){
		$Username = $_POST['Username'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$country = $_POST['country'];

		$host ='localhost';
		$user ='root';
		$pass = '';
		$dbname = "eventlogin";

		$conn = mysqli_connect($host,$user,$pass,$dbname);

		$sql ="INSERT INTO user details (Username, Email Address, Mobile Number, Country) VALUES ('$Username','$email','$mobile','$country')";

		mysqli_query($conn,$sql);
	}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>
	<form action="#" method="POST">
		Username : <input type="text" name="Username"><br>
		Email Address : <input type="email" name="email"><br>
		Mobile Number: <input type="number" name="mobile"><br>
		Country : <input type="text" name="country"><br>
		<input type="submit" name="submit" value="Send Data"><br>
	</form>
</body>
</html>